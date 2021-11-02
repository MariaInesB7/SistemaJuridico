<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     $this->middleware('auth');   
    }

    public function index()
    {
        //
        $expediente=Expediente::all();
        $clientes= DB::table('clientes')->get();
        return view('expediente.index',compact('expediente'),['clientes'=>$clientes]);
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
  
        $expediente=new Expediente;
        $expediente->id_Cliente=$request->input('id_Cliente');
        $expediente->causa=$request->input('causa');
        $expediente->codigo=$request->input('codigo');
        $expediente->proceso=$request->input('proceso');
        $expediente->demandante=$request->input('demandante');
        $expediente->demandado=$request->input('demandado');
        $expediente->tribunal=$request->input('tribunal');
        $expediente->juez=$request->input('juez');
        $expediente->secretario=$request->input('secretario');
        $expediente->fecha=$request->input('fecha');
        $expediente->hora=$request->input('hora');
       // $expediente->userID=auth()->user()->id;
        $expediente->save();

       return redirect()->route('expediente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $clientes= DB::table('clientes')->get();
        return view('expediente.edit',compact('expediente'),['clientes'=>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {
        $expediente->id_Cliente=$request->id_Cliente;
        $expediente->causa=$request->causa;
        $expediente->codigo=$request->codigo;
        $expediente->proceso=$request->proceso;
        $expediente->demandante=$request->demandante;
        $expediente->demandado=$request->demandado;
        $expediente->tribunal=$request->tribunal;
        $expediente->juez=$request->juez;
        $expediente->secretario=$request->secretario;
        $expediente->fecha=$request->fecha;
        $expediente->hora=$request->hora;
        $expediente->save();

        return redirect()->route('expediente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente)
    {
        //
        $expediente->delete();
        return redirect()->route('expediente.index');
    
    }
}
