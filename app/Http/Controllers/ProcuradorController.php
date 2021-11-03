<?php

namespace App\Http\Controllers;

use App\Models\Procurador;
use Illuminate\Http\Request;

class ProcuradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     $this->middleware('auth.abog');   
    }

    public function index()
    {
        $procurador=Procurador::all();
        return view('procurador.index',compact('procurador'));
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
        //
        date_default_timezone_set("America/La_Paz");
        $procurador=new Procurador;
        $procurador->ci=$request->input('ci');
        $procurador->nombre=$request->input('nombre');
        $procurador->sexo=$request->input('sexo');
        $procurador->telefono=$request->input('telefono');
        $procurador->email=$request->input('email');
        $procurador->domicilio=$request->input('domicilio');

       // $procurador->userID=auth()->user()->id;
        $procurador->save();
        
        return redirect()->route('procurador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function show(Procurador $procurador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function edit(Procurador $procurador)
    {
        //
        return view('procurador.edit',compact('procurador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procurador $procurador)
    {
        //
        date_default_timezone_set("America/La_Paz");
        $procurador->ci=$request->ci;
        $procurador->nombre=$request->nombre;
        $procurador->sexo=$request->sexo;
        $procurador->telefono=$request->telefono;
        $procurador->email=$request->email;
        $procurador->domicilio=$request->domicilio;
        $procurador->save();

        return redirect()->route('procurador.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procurador  $procurador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procurador $procurador)
    {
        //
        $procurador->delete();
        return redirect()->route('procurador.index');
    }
}
