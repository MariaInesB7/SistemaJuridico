<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth.proc']);  
     
    }

    public function index()
    {

        $archivos=Archivo::paginate(5);
        $expedientes= DB::table('expedientes')->get();
        return view('archivo.index',compact('archivos'),['expedientes'=>$expedientes]);

       
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
        $request->validate([

            'id_Exp' => 'required','descripcion' => 'required', 
             'imagen' => 'required |image| mimes:jpeg,png,svg|max: 1024 ',
            'fecha' => 'required','hora' => 'required'
         ]);
            
            $archivo= $request->all();
            
            if($imagen = $request->file('imagen')) {
            
            $rutaGuardarImg='images/';
            
            $imagenArch = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move ($rutaGuardarImg, $imagenArch);     
            $archivo['imagen'] = "$imagenArch";
            
            }
            
            Archivo::create($archivo);
           
            return redirect()->route('archivo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
        $expedientes= DB::table('expedientes')->get();
        
        return view('archivo.edit',compact('archivo'),['expedientes'=>$expedientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
        
        date_default_timezone_set("America/La_Paz");
        $request->validate([
        
            'id_Exp' => 'required','descripcion' => 'required', 
             'imagen' => 'required |image| mimes:jpeg,png,svg|max: 1024 ',
            'fecha' => 'required','hora' => 'required'
        ]);

        $archivoN = $request->all();
         if($imagen = $request->file('imagen'))
         {
            $rutaGuardarImg = 'images/';
            $imagenArch = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
            $imagen->move($rutaGuardarImg, $imagenArch);
            $archivoN['imagen'] = "$imagenArch";
         }else{
            unset($archivoN['imagen']);
         }

         $archivo->update($archivoN);
      
         return redirect()->route('archivo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
   
        $archivo->delete();
        return redirect()->route('archivo.index');
    }
}
