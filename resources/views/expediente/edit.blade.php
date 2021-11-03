<html>
    <head>
      
        <link href="{{asset('/css/viewForm.css') }}"  rel="stylesheet" type="text/css" >
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        
        
        <title> Editar expediente </title>
    </head>
    <body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h2>Editar expediente</h2>
               <div class="card">
                <form method="post" action="{{route('expediente.update',$expediente)}}" novalidate >
                    @csrf
                    @method('PATCH')
                  
                    <div class="row justify-content-between text-left">
                        <h5>Cliente:</h5>
                        <select name = "id_Cliente" id="idCliente" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Seleccione el cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">
                                        {{$cliente->nombre}}
                                    </option>
                                @endforeach
                        </select>
                       </div>

                    <div class="row justify-content-between text-left">
                        <h5>Causa:</h5>
                <input type="text"  name="causa" value="{{$expediente->causa}}" class="focus border-primary  form-control" >
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Codigo:</h5>
            <input type="text"  name="codigo" value="{{$expediente->codigo}}" class="focus border-primary  form-control" >
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Proceso:</h5>
                        <input type="text" name="demandante" value="{{$expediente->proceso}}"  class="focus border-primary  form-control" >
            
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Demandante:</h5>
                        <input type="text" name="demandante" value="{{$expediente->demandante}}"  class="focus border-primary  form-control" >
                         </div>

                        <div class="row justify-content-between text-left">
                            <h5>Demandado:</h5>
                        <input type="text" name="demandado" value="{{$expediente->demandado}}" class="focus border-primary  form-control" >
                             </div>
                       <div class="row justify-content-between text-left">
                            <h5>Tribunal:</h5>
                            <input type="text" name="tribunal" value="{{$expediente->tribunal}}" class="focus border-primary  form-control" >
                        </div >
                        <div class="row justify-content-between text-left">
                            <h5>Juez:</h5>
                            <input type="text" name="juez" value="{{$expediente->juez}}" class="focus border-primary  form-control" >
                        </div >
                        <div class="row justify-content-between text-left">
                            <h5>Secretario:</h5>
                            <input type="text" name="secretario" value="{{$expediente->secretario}}" class="focus border-primary  form-control" >
                        </div >
                        <div class="row justify-content-between text-left">
                            <h5>Fecha:</h5>
                            <input type="text" name="fecha" value="{{$expediente->fecha}}" class="focus border-primary  form-control" >
                        </div >
                        <div class="row justify-content-between text-left">
                            <h5>Hora:</h5>
                            <input type="text" name="hora" value="{{$expediente->hora}}" class="focus border-primary  form-control" >
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