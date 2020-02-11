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

    /** Delete Feature
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $feature = Feature::destroy($id);
        return response()->json($feature);
    }

    /** Create Feature
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $feature = Feature::create($request->input());
        return response()->json($feature);
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
        $feature = Feature::find($id);
        $feature->feature_title = $request->feature_title;
        $feature->feature_icon = $request->feature_icon;
        $feature->feature_content = $request->feature_content;
        $feature->event_id = $request->event_id;
        $feature->save();
        return response()->json($feature);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $feature_id
     * @return \Illuminate\Http\Response
     */
    public function show($feature_id)
    {
        $feature = Feature::find($feature_id);
        return response()->json($feature);
    }
}
