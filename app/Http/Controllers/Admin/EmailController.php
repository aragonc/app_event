<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
