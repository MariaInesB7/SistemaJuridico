@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-width: 850px">
                <div class="card-header">{{ __('Abogados') }}</div>

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
                       
                            <dl class="list-group-item clearfix">
                                
                            
                            <dt style="float: right">  {{$abogado->ci}} </dt>
                            <dt>  {{$abogado->nombre}} </dt>   
                               
                                <dd style="float: right"> Telefono:  {{$abogado->telefono}} </dd>
                                <dd> Email:  {{$abogado->email}} </dd>
                                <dd style="float: right"> Sexo:  {{$abogado->sexo}} </dd>
                                <dd > Domicilio:  {{$abogado->domicilio}} </dd>
                             <span  class="pull-rigth button-group" style="float: top">
                                <form action="{{route('abogado.destroy',$abogado)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                 <input type="submit" name="submit" value="Eliminar" class="btn btn-danger" style="float: right">   
                                
                                
                                </form>
                                <a href="{{route('abogado.edit',$abogado)}}"class="btn btn-info btn-sm">Editar</a>

                            </span> 
                        </dl>
                        
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
                    <h5>Sexo:</h5>
                    <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
        
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
