@extends('layouts.app')
@section('content')

<div style="background-color: #CEDACC;"> 
<header >
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/seplogo.png" height="105px"  style="position: relative; top: 10px; left: 980px;"/>
    <img class="header-img" src ="https://bucketproyecto22.s3.amazonaws.com/logo_tecnm_2.png" height="105px"  style="position: relative; top: 10px; left: -300px;"/>
    <h1 style="text-align: center;" >REGISTRAR PARTICIPANTE A EVENTO</h1>
</header>  
</div>
    <div>
        <div  class="container mt-5">
            <!--En el form añadimos el metodo post y la accion para que cuando de click ejecute
            lo que se encuentra en el metodo store-->
            <form action="{{ route('taskparticipant.store') }}" method="POST">  
                @csrf <!--El csrf es para que no expire la pagina-->
                
                <label for="Name">Elige un participante</label>

                <select name="participant" id="participant" class="form-control">
                    <option value=""> -- Elige un participante --</option>
                    <!--Con el foreach hacemos un recorrido del array union y
                    asignamos a la variable $participant el elemento que este recorriendo
                     y asociamos el valor a la variable $ptc-->
                    @foreach ($union as $participant => $ptc)
                    <option value="{{ $ptc->id }}">{{ $ptc->nombres }}</option>
                    @endforeach 
                </select>
                <br>

                <label for="Name">Elige un evento</label>

                <select name="event" id="event" class="form-control">
                    <option value=""> -- Elige un evento --</option>
                    <!--Con el foreach hacemos un recorrido del array evento y
                    asignamos a la variable $evento el elemento que este recorriendo
                     y asociamos el valor a la variable $evt-->
                    @foreach ($evento as $event => $evt)
                    <option value="{{ $evt->id }}">{{ $evt->nombre }}</option>
                    @endforeach 
                </select><br>

                <input type="submit" class="btn btn-primary">

                <br>
                <br>
                <tr  @foreach ($tableunion as $table)> 
                    <th scope="row">{{$table}}</th>
                </tr @endforeach>
            </form>
        </div>
</div>
@endsection

  {{--
        <tr  @foreach ($eventParticipants as $eventp)> 
        <td>{{$eventp['nombres']}}</td>
        
       </tr @endforeach>
    --}}
   