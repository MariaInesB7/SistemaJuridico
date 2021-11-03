<?php

namespace App\Http\Controllers;

use App\Models\Abogado;
use App\Models\Defiende;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefiendeController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $abogados=DB::table('abogados')->get();
        $expedientes=DB::table('expedientes')->get();
        $defiendes=DB::table('defiendes')->get();
       return view('defiende.create',['abogados'=>$abogados],['expedientes'=>$expedientes],
       ['defiendes'=>$defiendes],);
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
        $idAbg = request('idAbg');
        $idExp = request('idExp');
        
        $defiende=defiende::create([
            'idExp' => Expediente::all()->last()->id,
            'idAbg'=> request('idAbg'),
            'fecha' => request('fecha'),
        ]);

      
        return redirect(route('expediente.index'),compact('defiende'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Defiende  $defiende
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $expedientes=Expediente::findOrFail($id);
        $defiendes=DB::table('defiendes')->where('id_Exp',$expedientes->id)->get();
        $abogados=DB::table('abogados')->get();
        return view('defiendes.show',compact('expedientes'),['defiendes'=>$defiendes, 'abogados'=>$abogados, 'expedientes'=>$expedientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Defiende  $defiende
     * @return \Illuminate\Http\Response
     */
    public function edit(Defiende $defiende)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Defiende  $defiende
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Defiende $defiende)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Defiende  $defiende
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $id_Exp = DB::table('defiendes')->where('id',$id)->value('id_Exp');
        Defiende::destroy($id);
        return redirect()->route('defiende.show',$id_Exp);
    }
}
