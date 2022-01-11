@extends('layouts.app')
@section('content')


<div style="background-color: #CEDACC;"> 
<header >
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/seplogo.png" height="105px"  style="position: relative; top: 10px; left: 980px;"/>
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/logo_tecnm_2.png" height="105px"  style="position: relative; top: 10px; left: -300px;"/>
    <h1 style="text-align: center;" >REGISTRO DE EVENTOS</h1>
</header>
</div>   
    <div class="container mt-5">
        <div class="row"> 
                <div class="col-md-3">
                        <h1>Ingrese datos</h1>
                             <!--En el form añadimos el metodo post y la accion para que cuando de click ejecute
                            lo que se encuentra en el metodo store-->   
                            <form method="post" action="{{ route('tasks.store') }}">
                                @csrf <!--El csrf es para que no expire la pagina-->
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descricion">
                                    <input type="date" class="form-control mb-3" name="fechaInicio" placeholder="FechaInicio">
                                    <input type="date" class="form-control mb-3" name="fechaFin" placeholder="FechaFin">

                                    <input type="submit" class="btn btn-primary"> 
                            </form>
                </div>
                <div class="col-md-8">
                    <table class="table" >
                            <thead class="table-success table-striped" >
                                <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--Con el foreach hacemos un recorrido del array tasks y
                            asignamos a la variable $task el elemento que este recorriendo-->
                                 <tr  @foreach ($tasks as $tsk)>
                                 <td>{{ $tsk->id }}</td>
                                 <td>{{ $tsk->nombre }}</td>
                                 <td>{{ $tsk->descripcion }}</td>
                                 <td>{{ $tsk->fechaInicio }}</td>
                                 <td>{{ $tsk->fechaFin }}</td>

                                 <td>
                                     <!--En el boton llamamos al metodo edit y le mandamos la variable id-->
                                     <a href="{{ route('tasks.edit', $tsk->id) }}" class="btn btn-warning">Actualizar</a>
                                 </td>
                                 
                                 <td>
                                     <!--En el boton llamamos al metodo destroy y le mandamos la variable id-->
                                    <form action="{{ route('tasks.destroy', $tsk->id) }}" method="POST">  
                                        @method('DELETE')
                                        @csrf<!--El csrf es para que no expire la pagina-->
                                        <button class="btn btn-danger" type="submit">Eliminar</button>  
                                    </form>
                                </td>        
                                </tr @endforeach>
                            </tbody>        
                    </table>
                </div>         
        </div>  
@endsection