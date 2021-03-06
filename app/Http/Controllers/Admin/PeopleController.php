<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use App\Event;
use App\Mail\MessageNotification;
use App\Mail\MessageRegister;
use App\People;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::orderBy('id','DESC')->paginate(20);
        return view('people.index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'dni' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'country' => 'required',
                'authorize' => 'required',
                'event_id' => 'required'
            ]
        );
        //Limpiamos la session
        session()->flush();
        //Verificamos  si el email existe o no
        $people = People::where('email','=',Input::get('email'))->where('event_id','=',Input::get('event_id') )->first();
        if($people != null){
            session()->put('info','El correo ya se encuentra registrado...');
            return redirect()->back();
        } else {
            $people = People::create($request->all());
            $event = Event::find($people->event_id);
            $email = $people->email;
            $emailNotification = $event->contact_email;
            Mail::to($email)->send(new MessageRegister($people,$event));
            Mail::to($emailNotification)->send(new MessageNotification($people,$event));
            session()->put('notify','Email enviado');

            return redirect()->back();
        }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
