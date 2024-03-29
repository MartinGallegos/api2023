<?php

namespace App\Http\Controllers;

use App\Models\DatosDePersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendStorePersona;

class DatosDePersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
       $validated = $request->validate([ 
        'name' => 'required|max:255',
        'email' => 'required|email|unique:datosdepersona,email',
        'phone' => 'required|max:255',
        'message' =>'required',
        
       ]);

         $datosdepersona = DatosDePersona::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        'message' =>$request['message'],
        ]);
//envio de correo
$details = [
    'nombre' => $datosdepersona->name,
];
Mail::to('sandbox.smtp.mailtrap.io')->send(new SendStorePersona($details));
         
return response()->json([
            'mensaje' => 'La persona se agrego correctamente',
            'data' => '$DatosDePersona',
         ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Datosdepersona $datosdepersona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datosdepersona $datosdepersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datosdepersona $datosdepersona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datosdepersona $datosdepersona)
    {
        //
    }
}
