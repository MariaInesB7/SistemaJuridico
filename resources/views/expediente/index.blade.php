@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-width: 850px">
                <div class="card-header">{{ __('Expediente') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <button class="btn btn-primary btn-lg" data-toggle="modal"
                    data-target="#addModal" 
                    type="button"  name="button"> 
                    Agregar Expediente
                    </button>
                    <hr>
                    <h3> Lista de expediente</h3>
                    <ul  class="list-group">
                        @foreach($expediente as $expediente)
                       
                            <dl class="list-group-item clearfix">
                              <dt style="float: right">  ID: {{$expediente->id}} </dt>
                            <dt>  Causa: {{$expediente->causa}} </dt>
                           
                           <dd>  Código:  {{$expediente->codigo}}  </dd>
                                
                               
                            
                                <dd style="float: right" > 
                                  Cliente: {{DB::table('clientes')->where('id',$expediente->id_Cliente)->value('nombre')}} </dd>
                                
                             
                                <dd > Proceso:  {{$expediente->proceso}} </dd>
                                
                                <dd style="float: right "> Demandado:  {{$expediente->demandado}} </dd>
                                <dd > Demandante :  {{$expediente->demandante}} </dd>
                                <dd style="float: right "> Juez:  {{$expediente->juez}} </dd>
                                <dd> Tribunal:  {{$expediente->tribunal}} </dd>
                                
                                <dd> Secretario:  {{$expediente->secretario}} </dd>
                                
                                <dd style="float: right "> Hora:  {{$expediente->hora}} </dd>
                                <dd> Fecha de ingreso:  {{$expediente->fecha}} </dd>
                             <span  class="pull-rigth button-group" style="float: top">
                                <form action="{{route('expediente.destroy',$expediente)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                 <input type="submit" name="submit" value="Eliminar" class="btn btn-danger" style="float: right">   
                                
                                
                                </form>
                                <a href="{{route('expediente.edit',$expediente)}}"class="btn btn-info btn-sm">Editar</a>
                                
                                
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
          <h4 class="modal-title">Agregar Expediente</h4>
        </div>
        <div class="modal-body">
          <form  action="{{route('expediente.store')}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <h5>Cliente:</h5>
            <select name = "id_Cliente" id="idMarca" class="form-control" onchange="habilitar()" >
                <option value="nulo">Seleccione el cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">
                            {{$cliente->nombre}}
                        </option>
                    @endforeach
            </select>
              </div>

              <div class="form-group">
                  <label> Causa </label>
                  <input type="text" class="form-control" name="causa">
                </div>
                <div class="form-group">
                    <label> Codigo </label>
                    <input type="text" class="form-control" name="codigo">
                  </div>
                  <div class="form-group">
                    <h5>Proceso</h5>
                    <input type="text" class="form-control" name="proceso">
        
                  <div class="form-group">
                    <label> Demandante </label>
                    <input type="text" class="form-control" name="demandante">
                  </div>
                  <div class="form-group">
                    <label> Demandado </label>
                    <input type="text" class="form-control" name="demandado">
                  </div>
                  <div class="form-group">
                    <label> Tribunal</label>
                    <input type="text" class="form-control" name="tribunal">
                  </div>
                  <div class="form-group">
                    <label> Juez</label>
                    <input type="text" class="form-control" name="juez">
                  </div>
                  <div class="form-group">
                    <label> Secretario</label>
                    <input type="text" class="form-control" name="secretario">
                  </div>
                  <div class="form-group">
                    <label> Fecha de ingreso</label>
                    <input type="text" class="form-control" name="fecha">
                  </div>
                  <div class="form-group">
                    <label> Hora de ingreso</label>
                    <input type="text" class="form-control" name="hora">
                  </div>
                  <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </form>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection