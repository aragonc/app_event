<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Load Files
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class EventController extends Controller
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
        $events = Event::orderBy('id','DESC')->paginate(10);
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('event.create',compact('categories'));
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
        $pathFileTwo = null;
        $pathMedia = null;
        $pathMovil = null;

        //Comprobamos que enviamos la imagen y que no este vacia
        if($request->hasFile('image_top')){
            $file = $request->file('image_top');

            //comprobamos que la imagen tenga el tamaño correcto 1440 x 1024
            $image = Image::make($file->getRealPath());
            if($image->getWidth() != '1440' and $image->getHeight() !='1024'){
                return back()->with('error','La imagen debe ser de 1440 x 1024 pixeles');
            } else {
                $name = time().'_event_'.$file->getClientOriginalName();
                $pathFile = $file->storeAs('public/upload/event',$name);
            }
        }

        if($request->hasFile('image_bottom')){
            $file2 = $request->file('image_bottom');

            //comprobamos que la imagen tenga el tamaño correcto 1440 x 1024
            $image2 = Image::make($file2->getRealPath());
            if($image2->getWidth() != '1440' and $image2->getHeight() !='1024'){
                return back()->with('error','La imagen debe ser de 1440 x 1024 pixeles');
            } else {
                $name2 = time().'_event_'.$file2->getClientOriginalName();
                $pathFileTwo = $file2->storeAs('public/upload/event',$name2);
            }
        }

        if($request->hasFile('media')){
            $file3 = $request->file('media');

            //comprobamos que la imagen tenga el tamaño correcto 600 x 144
            $image3 = Image::make($file3->getRealPath());
            if($image3->getWidth() != '600' and $image3->getHeight() !='144'){
                return back()->with('error','La imagen debe ser de 600 x 144 pixeles');
            } else {
                $name3 = time().'_event_'.$file3->getClientOriginalName();
                $pathMedia = $file3->storeAs('public/upload/event',$name3);
            }
        }
        
        if($request->hasFile('image_movil')){
            $file4 = $request->file('image_movil');

            //comprobamos que la imagen tenga el tamaño correcto 400 x 950
            $image4 = Image::make($file4->getRealPath());
            if($image4->getWidth() != '420' and $image4->getHeight() !='750'){
                return back()->with('error','La imagen debe ser de 420 x 750 pixeles');
            } else {
                $name4 = time().'_event_'.$file4->getClientOriginalName();
                $pathMovil = $file4->storeAs('public/upload/event',$name4);
            }
        }

        //Creamos el evento y agregamos la imagen al registro
        $event = Event::create($request->all());
        $event->fill(['image_top' => $pathFile])->save();
        $event->fill(['image_bottom' => $pathFileTwo])->save();
        $event->fill(['media' => $pathMedia])->save();
        $event->fill(['image_movil' => $pathMovil])->save();

        return redirect()->route('event.edit', $event->id)->with('info','El evento fue creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $event = Event::find($id);
        return view ('event.edit',compact(['event','categories']));
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
        $pathFile = null;
        $pathFile2 = null;
        $pathFile3 = null;
        $pathFile4 = null;
        $message =  null;

        $event = Event::find($id);

        //Verificamos que la image desea ser borrada
        $deleteImage1 = $request->has('delete_top');
        $deleteImage2 = $request->has('delete_bottom');
        $deleteImage3 = $request->has('delete_media');
        $deleteImage4 = $request->has('delete_movil');

        //Eliminamos la imagen superior , inferior y movil
        $deleted1 = $deleted2 = $deleted3 = $deleted4 = false;

        if($deleteImage1){
            $fullPath1 = $event->image_top;
            $deleted1 = Storage::delete($fullPath1);
            if($deleted1){
                $event->fill(['image_top' => $pathFile])->save();
            }
        }

        if($deleteImage2){
            $fullPath2 = $event->image_bottom;
            $deleted2 = Storage::delete($fullPath2);
            if($deleted2){
                $event->fill(['image_bottom' => $pathFile2])->save();
            }
        }

        if($deleteImage3){
            $fullPath3 = $event->media;
            $deleted3 = Storage::delete($fullPath3);
            if($deleted3){
                $event->fill(['media' => $pathFile3])->save();
            }
        }
        
        if($deleteImage4){
            $fullPath4 = $event->image_movil;
            $deleted4 = Storage::delete($fullPath4);
            if($deleted4){
                $event->fill(['image_movil' => $pathFile4])->save();
            }
        }


        if($deleted1 or $deleted2 or $deleted3 or $deleted4){
            return back()->with('info','La imagen fue eliminada');
        }

        // Imagen top carga y registro en base de datos
        if($request->hasFile('image_top')){
            $file = $request->file('image_top');

            // Comprobamos que tenga el tamaño correcto
            $image = Image::make($file->getRealPath());
            if($image->getWidth() != '1440' and $image->getHeight() !='1024'){
                return back()->with('error','La imagen debe ser de 1440 x 1024 pixeles');
            } else {
                $name = time().'_event_'.$file->getClientOriginalName();
                $pathFile = $file->storeAs('public/upload/event',$name);

                //$event->fill($request->all())->save();
                $event->fill(['image_top' => $pathFile])->save();
            }
        }elseif($request->hasFile('image_bottom')){
            $file2 = $request->file('image_bottom');

            // Comprobamos que tenga el tamaño correcto
            $image2 = Image::make($file2->getRealPath());
            if($image2->getWidth() != '1440' and $image2->getHeight() !='1024'){
                return back()->with('error','La imagen debe ser de 1440 x 1024 pixeles');
            } else {
                $name2 = time().'_event_'.$file2->getClientOriginalName();
                $pathFile2 = $file2->storeAs('public/upload/event',$name2);
                $event->fill(['image_bottom' => $pathFile2])->save();
            }
        }elseif($request->hasFile('media')){
            $file3 = $request->file('media');

            // Comprobamos que tenga el tamaño correcto
            $image3 = Image::make($file3->getRealPath());
            if($image3->getWidth() != '600' and $image3->getHeight() !='144'){
                return back()->with('error','La imagen debe ser de 600 x 144 pixeles');
            } else {
                $name3 = time().'_event_'.$file3->getClientOriginalName();
                $pathFile3 = $file3->storeAs('public/upload/event',$name3);

                //$event->fill($request->all())->save();
                $event->fill(['media' => $pathFile3])->save();
            }
        }elseif($request->hasFile('image_movil')){
              
            $file4 = $request->file('image_movil');

            // Comprobamos que tenga el tamaño correcto
            $image4 = Image::make($file4->getRealPath());
            if($image4->getWidth() != '420' and $image4->getHeight() !='750'){
                return back()->with('error','La imagen debe ser de 420 x 750 pixeles');
            } else {
                $name4 = time().'_event_'.$file4->getClientOriginalName();
                $pathFile4 = $file4->storeAs('public/upload/event',$name4);

                //$event->fill($request->all())->save();
                $event->fill(['image_movil' => $pathFile4])->save();
            }
            
            
        }else{
            $event->fill($request->all())->save();
        }

        return redirect()->route('event.edit', $event->id)->with('info','El evento fue actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }


}
