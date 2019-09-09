<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function post($slug){
        $event = Event::where('slug',$slug)->first();
        $status = $event->status;
        if($status == 'published'){
            return view('event', compact('event'));
        } else {
            return abort(404);
        }

    }
}
