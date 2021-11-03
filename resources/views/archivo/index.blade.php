@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="min-width: 900px" class="card">
                <div  class="card-header">{{ __('Archivos') }}</div>

                <div class="card-body">
                  <!--desde aqui empieza-->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  
                    <button class="btn btn-primary btn-lg" data-toggle="modal"
                    data-target="#addModal" 
                    type="button"  name="button"> 
                   Subir documento
                    </button>
                    <hr>
                    <h3> Lista de archivos</h3>
                    <table class="table-fixed w-full" >
                    <thead>
                        <tr class="bg-gray-800 text-black"> 
                          <th class="border px-4 py-2">ID      </th>
                          <th class="border px-4 py-2">ID expediente </th>
                          <th class="border px-4 py-2">Descripcion  </th>
                          <th class="border px-4 py-2">Imagen     </th>
                          <th class="border px-4 py-2">Fecha      </th>
                          <th class="border px-4 py-2">Hora  </th>
                          <th class="border px-4 py-2">Acciones  </th>
                        </tr>
                          
                  </thead>

                  <tbody>
                   
                    @foreach ($archivos as $archivo)
                    <tr class="bg-gray-800 text-black"> 
                          <td class="border px-14 py-1">{{$archivo->id}}</td>
                          <td class="border px-14 py-1">{{$archivo->id_Exp}}</td>
                          <td class="border px-14 py-1">{{$archivo->descripcion}}</td>
                          
                          <td class="border px-14 py-1"> <img src="images/{{$archivo->imagen}}" width="75%" > </td>
                          <td class="border px-14 py-1">{{$archivo->fecha}}</td>
                          <td class="border px-14 py-1">{{$archivo->hora}}</td>
                          <td class="border px-14 py-1">
                         
                            <form action="{{route('archivo.destroy',$archivo)}}" method="POST">
                                @csrf
                                @method('delete')
                             <input type="submit" name="submit" value="Eliminar" class="btn btn-danger" >   
                            
                            
                            </form>
                            
                            <a href="{{route('archivo.edit',$archivo)}}"class="btn btn-info btn-sm">Editar</a>

                              </td>
                        </tr>
                        @endforeach
                        
                     
                    
                  </tbody>
                </table>
 {{-- Pagination --}}
                <div class="d-flex justify-content-center" >
               
                  {!! $archivos->links("pagination::bootstrap-4") !!}
                
              </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Agregue el formulario-->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar Archivo</h4>
        </div>
        <div class="modal-body">
          <form  action="{{route('archivo.store')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <h5>Expediente:</h5>
            <select name = "id_Exp" id="idExp" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione el expediente</option>
                    @foreach ($expedientes as $expediente)
                        <option value="{{$expediente->id}}">
                            {{$expediente->id}}
                        </option>
                    @endforeach
            </select>
              </div>

              <div class="form-group">
                <img id="imagenSeleccionada" style="max-width: 300px">
              </div>
              <div class="form-group">
                <label> Imagen </label>
                
                <input type="file" name="imagen"  id="imagen" class="hidden">
              </div>
              <div class="form-group">
                  <label> Descripcion: </label>
                  <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="form-group">
                    <label>Fecha: </label>
                    <input type="text" class="form-control" name="fecha">
                  </div>

                  <div class="form-group">
                    <label> Hora: </label>
                    <input type="text" class="form-control" name="hora">
                  </div>
                 
                  
                  <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </form>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection


 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

        $(document).ready(function (e) {

        $('#imagen').change (function(){

        let reader = new FileReader();

        reader.onload = (e) => {

              $('#imagenSeleccionada').attr('src', e.target.result);

        }

reader.readAsDataURL(this.files[0]);

});



});

</script>