<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Load Files
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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

        if($request->hasFile('image')){

            $file = $request->file('image');
            $name = time().'_category_'.$file->getClientOriginalName();

            $image = Image::make($file->getRealPath());
            if($image->getWidth() == '425' and $image->getHeight() == '90'){
                $image->save();
                $pathFile = $file->storeAs('public/upload/category',$name);
            } else {
                return back()->with('info','Debe de seleccionar una imagen de 425 x 90');
            }
        }
        $category = Category::create($request->all());
        $category->fill(['image' => $pathFile])->save();
        return redirect()->route('category.edit', $category->id)->with('info','El anuncio fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view ('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view ('category.edit',compact('category'));
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
        $category = Category::find($id);
        $pathFile = null;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $name = time().'_category_'.$file->getClientOriginalName();

            $image = Image::make($file->getRealPath());
            if($image->getWidth() == '425' and $image->getHeight() == '90'){
                $image->save();
                $pathFile = $file->storeAs('public/upload/category',$name);
            } else {
                return back()->with('info','Debe de seleccionar una imagen de 425 x 90');
            }
        }

        $category->fill($request->all())->save();
        $category->fill(['image' => $pathFile])->save();
        
        return redirect()->route('category.edit', $category->id)->with('info','El anuncio fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
