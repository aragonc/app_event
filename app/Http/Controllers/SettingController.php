<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

//Load Files
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::all();
        return view('setting.index', compact('settings'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view ('setting.edit',compact('setting'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = null;
        $pathFile = null;

        $setting = Setting::find($id);

        //Verificamos que la image desea ser borrada
        $deleteImage = $request->has('delete_image');
        if($deleteImage){
            $fullPath = $request->get('value');
            $deleted = Storage::delete($fullPath);
            if($deleted){
                $setting->fill(['value' => $pathFile])->save();
                return back()->with('info','La imagen fue eliminada');
            }
        }

        if($request->has('image')){
            $file = $request->file('image');

            // Comprobamos que tenga el tamaño correcto
            $image = Image::make($file->getRealPath());
            if($image->getWidth() != '300' and $image->getHeight() !='110'){
                return back()->with('error','La imagen debe ser de 300 x 110 pixeles');
            } else {
                $name = uniqid().'_app_'.$file->getClientOriginalName();
                $pathFile = $file->storeAs('public/upload/setting',$name);
                $setting->fill(['value' => $pathFile])->save();
            }
        }else{
            if($request->has('setting')){
                $value = $request->get('setting');
                $setting->fill(['value'=> $value])->save();
            }

        }

        return redirect()->route('setting')->with('info','La configuración se actualizo con éxito');
    }
}
