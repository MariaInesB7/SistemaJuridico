<html>
    <head>
      
        <link href="{{asset('/css/viewForm.css') }}"  rel="stylesheet" type="text/css" >
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        
        
        <title> Editar archivo </title>
    </head>
    <body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h2>Editar archivo</h2>
               <div class="card">
                <form method="POST" action="{{route('archivo.update',$archivo->id)}}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                    <div class="row justify-content-between text-left">
                    <h5>Id expediente:</h5>
                    <select name = "id_Exp" id="idExp" class="form-control" onchange="habilitar()" >
                        <option value="nulo"> {{$archivo->id_Exp}}</option>

                            @foreach ($expedientes as $expediente)
                                <option value="{{$expediente->id}}">
                                    {{$expediente->id}}
                                </option>
                            @endforeach
                    </select>
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Descripcion:</h5>
                    <input type="text"  name="descripcion" value="{{$archivo->descripcion}}" class="focus border-primary  form-control" >
                    </div>
                    <div class="row justify-content-between text-left">
                            <h5>Imagen:</h5>

                        </div>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <img src= "/sistemaJur/public/images/{{$archivo->imagen}}" id="imagenSeleccionada" style="max-width: 300px">
                            </div>   

                            <div class="grid grid-cols-1 mt-5 mx-7">
                               
                            </div>    
                            <div class="row justify-content-between text-left">

                                <input type="file"  id="imagen"  name="imagen" class="hidden" >
                            </div>
                    
                    
                    <div class="row justify-content-between text-left">
                        <h5>Fecha:</h5>
                        <input type="text" name="fecha" value="{{$archivo->fecha}}"  class="focus border-primary  form-control" >
                         </div>

                        
                       <div class="row justify-content-between text-left">
                            <h5>Hora:</h5>
                            <input type="text" name="hora" value="{{$archivo->hora}}" class="focus border-primary  form-control" >
                        </div >
                          <div class="row justify-content-between text-left" >
                            

                          <button  class="btn btn-danger btn-sm" type="submit"> Guardar </button>
                          <a href="{{route('archivo.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                          
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>