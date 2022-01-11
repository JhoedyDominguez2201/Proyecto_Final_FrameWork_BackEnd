@extends('layouts.app')
@section('content')


<div style="background-color: #CEDACC;"> 
<header >
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/seplogo.png" height="105px"  style="position: relative; top: 10px; left: 980px;"/>
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/logo_tecnm_2.png" height="105px"  style="position: relative; top: 10px; left: -300px;"/>
    <h1 style="text-align: center;" >REGISTRO DE PARTICIPANTES</h1>
</header>
</div>   
    <div class="container mt-5">
        <div class="row"> 
             <div class="col-md-3">
                 <h1>Ingrese datos</h1>      
                     <!--En el form añadimos el metodo post y la accion para que cuando de click ejecute
                      lo que se encuentra en el metodo store-->
                     <form method="post" action="{{ route('participants.store') }}">
                        @csrf <!--El csrf es para que no expire la pagina-->
                            <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                            <input type="text" class="form-control mb-3" name="apellidopaterno" placeholder="Apellido Paterno">
                            <input type="text" class="form-control mb-3" name="apellidomaterno" placeholder="Apellido Materno">
                            <input type="text" class="form-control mb-3" name="genero" placeholder="Genero">
                            <input type="text" class="form-control mb-3" name="email" placeholder="Email">

                            <input type="submit" class="btn btn-primary">  
                        </form>
             </div>
             <div class="col-md-8">
                 <table class="table" >
                        <thead class="table-success table-striped" >
                            <tr>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Genero</th>
                            <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Con el foreach hacemos un recorrido del array participants y
                            asignamos a la variable $participant el elemento que este recorriendo
                            y asociamos el valor a la variable $ptct-->
                            <tr  @foreach ($participants as $participant => $ptct)>
                            <th scope="row">{{$participant}}</th>
                            <td>{{ $ptct->nombres }}</td>
                            <td>{{ $ptct->apellidopaterno }}</td>
                            <td>{{ $ptct->apellidomaterno }}</td>
                            <td>{{ $ptct->genero }}</td>
                            <td>{{ $ptct->email }}</td>

                            <td>
                                <!--En el boton llamamos al metodo edit y le mandamos la variable id-->
                                 <a href="{{ route('participants.edit', $ptct->id) }}" class="btn btn-warning">Actualizar</a>
                            </td>
                                 
                            <td>
                                <!--En el boton llamamos al metodo destroy y le mandamos la variable id-->
                                <form action="{{ route('participants.destroy', $ptct->id) }}" method="POST">  
                                    @method('DELETE')
                                    @csrf <!--El csrf es para que no expire la pagina-->
                                    <button class="btn btn-danger" type="submit">Eliminar</button>  
                                </form>
                            </td>        
                            </tr @endforeach>
                        </tbody>         
                    </table>
            </div>        
        </div>         
    </div>
@endsection