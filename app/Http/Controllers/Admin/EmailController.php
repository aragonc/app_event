<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Load Files
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::orderBy('id','DESC')->paginate(10);
        return view('emails.index', compact('emails'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        return view('emails.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pathFile = null;

        //Comprobamos que enviamos la imagen y que no este vacia

        if($request->hasFile('media')){
            $file = $request->file('media');

            // Comprobamos que tenga el tamaño correcto
            $image = Image::make($file->getRealPath());
            if($image->getWidth() != '600' and $image->getHeight() !='144'){
                return back()->with('error','La imagen debe ser de 600 x 144 pixeles');
            } else {
                $name = uniqid().'_message_'.$file->getClientOriginalName();
                $pathFile = $file->storeAs('public/upload/message',$name);
            }
        }

        //Crea la categoria y guarda la imagen en la base de datos
        $email = Email::create($request->all());
        $email->fill(['media' => $pathFile])->save();

        return redirect()->route('email.edit', $email->id)->with('info','El mensaje fue creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::all();
        $email = Email::find($id);
        return view ('emails.edit',compact(['email','events']));
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
        $email = Email::find($id);
        $pathFile = null;

        //Verificamos que la image desea ser borrada
        $deleteImage = $request->has('delete_image');
        if($deleteImage){
            $fullPath = $email->image;
            $deleted = Storage::delete($fullPath);
            if($deleted){
                $email->fill(['media' => $pathFile])->save();
                return back()->with('info','La imagen fue eliminada');
            }
        }

        //Comprobamos que se esta enviado una imagen
        if($request->hasFile('media')){
            $file = $request->file('media');

            // Comprobamos que tenga el tamaño correcto
            $image = Image::make($file->getRealPath());
            if($image->getWidth() != '600' and $image->getHeight() !='144'){
                return back()->with('error','La imagen debe ser de 600 x 144 pixeles');
            } else {
                $name = uniqid().'_message_'.$file->getClientOriginalName();
                $pathFile = $file->storeAs('public/upload/message',$name);
            }
        }

        $email->fill($request->all())->save();
        $email->fill(['media' => $pathFile])->save();

        return redirect()->route('email.edit', $email->id)->with('info','El mensaje fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
