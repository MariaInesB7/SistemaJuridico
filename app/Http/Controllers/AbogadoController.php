<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use Illuminate\Http\Request;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     $this->middleware('auth.admi');   
    }


    public function index()
    {
     //  $abogados= Abogado::where('user_id', auth()->user()->id)->get();
       $abogado=Abogado::all();
        return view('abogado.index',compact('abogado'));
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
        date_default_timezone_set("America/La_Paz");
        $abogado=new Abogado;
        $abogado->ci=$request->input('ci');
        $abogado->nombre=$request->input('nombre');
        $abogado->sexo=$request->input('sexo');
        $abogado->telefono=$request->input('telefono');
        $abogado->email=$request->input('email');
        $abogado->domicilio=$request->input('domicilio');

       // $abogado->userID=auth()->user()->id;
        $abogado->save();
        
        return redirect()->route('abogado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function show(Abogado $abogado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function edit(Abogado $abogado)
    {
        return view('abogado.edit',compact('abogado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abogado $abogado)
    {
        date_default_timezone_set("America/La_Paz");
        $abogado->ci=$request->ci;
        $abogado->nombre=$request->nombre;
        $abogado->sexo=$request->sexo;
        $abogado->telefono=$request->telefono;
        $abogado->email=$request->email;
        $abogado->domicilio=$request->domicilio;
        $abogado->save();

        return redirect()->route('abogado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abogado  $abogado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abogado $abogado)
    {
        $abogado->delete();
        return redirect()->route('abogado.index');
    }
}
