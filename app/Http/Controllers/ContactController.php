<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('contacto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => ['required', 'string', 'max:50'],
        // 'email' => ['required', 'email:rfc,dns', 'max:70'],
        'email' => ['required', 'email', 'max:70'],
        'telephone' => ['required', 'string', 'max:20'],
        'message' => ['required', 'string', 'max:1200'],
        ];
        $messages = [
          'required' => 'Por favor complete su :attribute',
          'max' => 'El :attribute es demasiado largo',
          'email' => 'Formato de e-mail no válido',
        ];
        $this->validate($request, $rules, $messages);
        // dd($request);
        // $test = new ContactMail($request);
        // dd($test);
        Mail::send(new ContactMail($request));

        return redirect('/contacto')->with('success', 'Su mensaje fue enviado, muchas gracias por contactarnos.');

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
        //
    }
}
