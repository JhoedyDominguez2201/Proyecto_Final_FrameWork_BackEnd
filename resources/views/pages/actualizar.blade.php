@extends('layouts.app')

@section('content')

        <!--En el form añadimos el metodo post y la accion para que cuando de click ejecute
            lo que se encuentra en el metodo update-->  
      <form method="post" action="{{ route('tasks.update', $task -> id) }}">
         
        <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ $task-> nombre }}"/>
          </div>

          <br>

          <div class="form-group">
              <label for="email">Descripcion</label>
              <input type="text" class="form-control" name="descripcion" value="{{ $task-> descripcion }}"/>
          </div>

          <br>

          <div class="form-group">
              <label for="email">Fecha Inicio</label>
              <input type="date" class="form-control" name="fechaInicio" value="{{ $task-> fechaInicio }}"/>
          </div>
          
          <br>
          
          <div class="form-group">
              <label for="email">Fecha Fin</label>
              <input type="date" class="form-control" name="fechaFin" value="{{ $task-> fechaFin }}"/>
          </div>
         
          <br>
          <button type="submit" class="btn btn-block btn-success">Actualizar evento</button>
      </form>
  </div>
</div>
@endsection