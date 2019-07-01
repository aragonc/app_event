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

        if($request->hasFile('background_top')){

            $file = $request->file('background_top');
            $name = time().'_event_'.$file->getClientOriginalName();
            $image = Image::make($file->getRealPath());
            $image->save();
            $pathFile = $file->storeAs('public/upload/event',$name);
        }
        $event = Event::create($request->all());
        $event->fill(['background_top' => $pathFile])->save();
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
        $event = Event::find($id);

        if($request->has('delete_top')){
            $delete = $event->background_top;
            unlink(storage_path('app/'.$delete));
            $event->fill(['background_top' => null])->save();
        }

        if($request->has('delete_bottom')){
            $delete2 = $event->background_bottom;
            unlink(storage_path('app/'.$delete2));
            $event->fill(['background_bottom' => null])->save();
        }

        if($request->hasFile('background_top')){
            $file = $request->file('background_top');
            $name = time().'_event_'.$file->getClientOriginalName();
            $image = Image::make($file->getRealPath());
            $image->save();
            $pathFile = $file->storeAs('public/upload/event',$name);
        }

        if($request->hasFile('background_bottom')){
            $file2 = $request->file('background_bottom');
            $name2 = time().'_event_'.$file2->getClientOriginalName();
            $image2 = Image::make($file2->getRealPath());
            $image2->save();
            $pathFile2 = $file2->storeAs('public/upload/event',$name2);
        }

        $event->fill($request->all())->save();
        $event->fill(['background_top' => $pathFile, 'background_bottom' => $pathFile2])->save();

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
