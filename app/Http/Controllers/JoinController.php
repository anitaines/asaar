<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\JoinMail;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
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
      $paisesApi = "https://restcountries.eu/rest/v2/all";
      $json = file_get_contents($paisesApi);
      $paises = json_decode($json, TRUE);
      // dd($paises[10]["translations"]);

      $estadoCivil = ["Soltero/a", "Casado/a", "En pareja", "Separado/a", "Viudo/a"];

      $documento = ["DNI", "Cédula", "L.E.", "L.C.", "Pasaporte",];

      $formaPago = ["Déposito o Transferencia", "Pago en Efectivo", "Pago Fácil/ Rapipago"];

      return view('asociarse', compact('paises', 'estadoCivil', 'documento', 'formaPago'));
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
        'surname' => ['required', 'string', 'max:50'],
        'address' => ['required', 'string', 'max:50'],
        'town' => ['required', 'string', 'max:50'],
        'state' => ['required', 'string', 'max:50'],
        'country' => ['required', 'string', 'max:50'],
        'cp' => ['required', 'string', 'max:10'],
        'telephone' => ['required', 'string', 'max:20'],
        'citizenship' => ['required', 'string', 'max:50'],
        'maritalStatus' => ['required', 'string', 'max:50'],
        'id' => ['required', 'string', 'max:10'],
        'number' => ['required', 'string', 'max:20'],
        'profession' => ['required', 'string', 'max:50'],
        'businessAddress' => ['required', 'string', 'max:50'],
        'email' => ['required', 'email', 'max:70'],
        'estatuto' => ['required', 'string', 'max:10'],
        'payment' => ['required', 'string', 'max:10'],
        // 'paymentType' => ['required', 'string', 'max:50'],
        ];
        $messages = [
          'required' => 'Por favor complete su :attribute',
          'max' => 'El :attribute es demasiado largo',
          'email' => 'Formato de e-mail no válido',
        ];
        $this->validate($request, $rules, $messages);

        Mail::send(new JoinMail($request));
         // GENERAR MAILABLE Y LINKEAR ARRIBA

        return redirect('/asociarse')->with('success', 'Formulario enviado, ¡Muchas gracias por asociarse!');
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
