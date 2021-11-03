<html>
    <head>
      
        <link href="{{asset('/css/viewForm.css') }}"  rel="stylesheet" type="text/css" >
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        
        
        <title> Asignar abogado a expediente</title>
    </head>
    <body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h2>Asignar abogado a expediente</h2>
               <div class="card">
                <form method="post" action="{{route('defiende.store')}}" novalidate >
                    @csrf
                   
                    <h5>Abogado:</h5>
                    <select name="id_Abg" id="idAbg" class="form-control" onchange="habilitar()" >
                        <option value="nulo">Seleccione un abogado</option>
                            @foreach ($abogados as $abogado)
                                <option value={{$abogado->id}}>
                                    {{$abogado->id}} 
                                
                                </option>
                            @endforeach
                    </select>

                    <div class="row justify-content-between text-left">
                        <h5>Expediente:</h5>
                      {{--}}  {{DB::table('expedientes')->where('id',$defiende->id_Exp)->value('id')}} --}}  
                       
                <input type="text"  name="id_Exp" class="focus border-primary  form-control" >
                                 
            
                            </div>
                    
                       <div class="row justify-content-between text-left">
                            <h5>Fecha:</h5>
                            <input type="text" name="fecha"  class="focus border-primary  form-control" >
                        </div >
                          <div class="row justify-content-between text-left" >
                          <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
                          <a href="{{route('expediente.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>