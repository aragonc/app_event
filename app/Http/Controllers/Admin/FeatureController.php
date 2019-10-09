<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $feature = Feature::where('event_id', $id)->orderBy('id','DESC')->paginate(10);
        return response()->json($feature, 201);
    }

    /** Delete Feature */
    public function destroy($id)
    {
        $feature = Feature::destroy($id);
        return response()->json($feature);
    }

    /** Create Feature  */
    public function store(Request $request)
    {
        $values = $request;
        $feature = Feature::create([
            'event_id' => $values['event_id'],
            'title' => $values['title'],
            'content' => $values['content'],
            'extra' => $values['extra'],
            'visible' => $values['visible'],
            'icon' => $values['icon']
        ]);
        return response()->json($feature);
    }

    /** Update Feature */
    public function update(Request $request, $id)
    {
        $feature = Feature::find($id)->update($request->all());
        return response()->json($feature);
    }

}
