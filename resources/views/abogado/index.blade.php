@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <!--{{ __('You are logged in!') }} -->
                    <button class="btn btn-primary btn-lg" data-toggle="modal"
                    data-target="#addModal" 
                    type="button"  name="button"> 
                    Agregar Abogado 
                    </button>
                    <hr>
                    <h3> Lista de abogados</h3>
                    <ul  class="list-group">
                        @foreach($abogado as $abogado)
                        <li class="list-group-item clearfix">
                            <dl>
                                
                            <a target="_blank" >
                         <!--  <a href="{{$abogado->nombre}}" target="_blank" style= "position: absolute;top:30%"> -->
                            <dt>  {{$abogado->nombre}} </dt>
                            <span class="label label-default"> 
                             <dd>   {{$abogado->telefono}} </dd>
                                </span>
                            </a>

                            
                             <span  class="pull-rigth button-group" style="float: right">
                                <form action="{{route('abogado.destroy',$abogado)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                 <input type="submit" name="submit" value="Eliminar" class="btn btn-danger" style="float: right">   
                                
                                
                                </form>
                                <a href="{{route('abogado.edit',$abogado)}}"class="btn btn-info btn-sm">Editar</a>

                            </span> 
                            </dl>
                        </li>
                        @endforeach
                       
                    </ul>
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
          <h4 class="modal-title">Agregar Abogado</h4>
        </div>
        <div class="modal-body">
          <form  action="{{route('abogado.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                  <label> CI </label>
                  <input type="text" class="form-control" name="ci">
                </div>
                <div class="form-group">
                    <label> Nombre </label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                  <div class="form-group">
                    <label> Sexo </label>
                    <input type="char" class="form-control" name="sexo">
                  </div>
                  <div class="form-group">
                    <label> Teléfono </label>
                    <input type="text" class="form-control" name="telefono">
                  </div>
                  <div class="form-group">
                    <label> Email </label>
                    <input type="text" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label> Domicilio </label>
                    <input type="text" class="form-control" name="domicilio">
                  </div>
                  <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </form>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection
