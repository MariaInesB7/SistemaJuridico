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
                         
                        </tr>
                          
                  </thead>

                  <tbody>
                   
                    @foreach ($archivos as $archivo)
                    <tr class="bg-gray-800 text-black"> 
                          <td class="border px-14 py-1">{{$archivo->id}}</td>
                          <td class="border px-14 py-1">{{$archivo->id_Exp}}</td>
                          <td class="border px-14 py-1">{{$archivo->descripcion}}</td>
                          
                          <td class="border px-14 py-1"> <img src="/sistemaJur/public/images/{{$archivo->imagen}}" width="75%" > </td>
                          <td class="border px-14 py-1">{{$archivo->fecha}}</td>
                          <td class="border px-14 py-1">{{$archivo->hora}}</td>
                          <td class="border px-14 py-1">
       
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
@endsection