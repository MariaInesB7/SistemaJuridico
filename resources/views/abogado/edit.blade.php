
<html>
    <head>
      
        <link href="{{asset('/css/viewForm.css') }}"  rel="stylesheet" type="text/css" >
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        
        
        <title> Editar Abogado </title>
    </head>
    <body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h2>Editar Abogado</h2>
               <div class="card">
                <form method="post" action="{{route('abogado.update',$abogado)}}" novalidate >
                    @csrf
                    @method('PATCH')
                  
                    <div class="row justify-content-between text-left">
                        <h5>Carnet de Identidad:</h5>
                <input type="text"  name="ci" value="{{$abogado->ci}}" class="focus border-primary  form-control" >
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$abogado->nombre}}" class="focus border-primary  form-control" >
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Sexo:</h5>
                        <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                            <option value="{{$abogado->sexo}}">{{$abogado->sexo}}</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
            
                    </div>
                    <div class="row justify-content-between text-left">
                        <h5>Telefono:</h5>
                        <input type="text" name="telefono" value="{{$abogado->telefono}}"  class="focus border-primary  form-control" >
                         </div>

                        <div class="row justify-content-between text-left">
                            <h5>Email:</h5>
                        <input type="text" name="email" value="{{$abogado->email}}" class="focus border-primary  form-control" >
                             </div>
                       <div class="row justify-content-between text-left">
                            <h5>Domicilio:</h5>
                            <input type="text" name="domicilio" value="{{$abogado->domicilio}}" class="focus border-primary  form-control" >
                        </div >
                          <div class="row justify-content-between text-left" >
                          <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
                          <a href="{{route('abogado.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>