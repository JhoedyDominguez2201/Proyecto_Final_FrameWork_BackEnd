@extends('layouts.app')
@section('content')

        <!--En el form añadimos el metodo post y la accion para que cuando de click ejecute
            lo que se encuentra en el metodo update--> 
      <form method="post" action="{{ route('participants.update', $participant -> id) }}">

          <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="name">Nombres</label>
              <input type="text" class="form-control" name="nombre" value="{{ $participant-> nombres }}"/>
          </div>

          <br>

          <div class="form-group">
              <label for="email">Apellido Paterno</label>
              <input type="text" class="form-control" name="apellidopaterno" value="{{ $participant-> apellidopaterno }}"/>
          </div>
          
          <br>

          <div class="form-group">
              <label for="email">Apellido Materno</label>
              <input type="text" class="form-control" name="apellidomaterno" value="{{ $participant-> apellidomaterno }}"/>
          </div>

          <br>

          <div class="form-group">
              <label for="email">Genero</label>
              <input type="text" class="form-control" name="genero" value="{{ $participant-> genero }}"/>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $participant-> email }}"/>
          </div>
         
          <br>

          <button type="submit" class="btn btn-block btn-success">Actualizar Participante</button>
      </form>
  </div>
</div>
@endsection