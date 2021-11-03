<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Expediente;
use Illuminate\Http\Request;


class ClienteController extends Controller
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

    public function index(Expediente $expedientes)
    {
        //
        $cliente=Cliente::all();
        return view('cliente.index',compact('cliente'));
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
        $cliente=new Cliente;
       
        $cliente->ci=$request->input('ci');
        $cliente->nombre=$request->input('nombre');
        $cliente->sexo=$request->input('sexo');
        $cliente->telefono=$request->input('telefono');
       
        $cliente->domicilio=$request->input('domicilio');

       // $cliente->userID=auth()->user()->id;
        $cliente->save();
        
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
       
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
     
        $cliente->ci=$request->ci;
        $cliente->nombre=$request->nombre;
        $cliente->sexo=$request->sexo;
        $cliente->telefono=$request->telefono;
      
        $cliente->domicilio=$request->domicilio;
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
