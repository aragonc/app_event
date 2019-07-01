<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function post($slug){
        $event = Event::where('slug',$slug)->first();
        return view('event', compact('event'));
    }
}
