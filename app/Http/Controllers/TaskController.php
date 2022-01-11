<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    //METODO PARA MOSTRAR LOS EVENTOS DE LA BASE DE DATOS EN LA VISTA
    public function index()
    {
        //Consulta
        $tasks = Task::all();
        //Regresa a la vista que se encuentra en esa url junto con la variable
        return response()-> view('pages/eventos', compact('tasks')/* ['tasks' => $tasks]*/);
    }

    //METODO PARA CREAR UN EVENTO
    public function store(Request $request)
    {
        //Validamos los parametros
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required'
        ]);

        //Creamos el nuevo participante 
        $tasks = Task::create($request->all());
        //Regresa al metodo index
        return redirect()->route('tasks.index');

    }
    
    //METODO PARA EDITAR UN EVENTO
    public function edit($id)
    {
        //Busca que exista un participante con ese id
        $task = Task::findOrFail($id);
        return view('pages/actualizar', compact('task')/*[ 'task'=> $task]*/);
    }

     //METODO PARA ACTUALIZAR UN EVENTO
    public function update(Request $request, $id)
    {
        //Validamos los parametros
        $updateData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
            'fechaInicio' => 'required',
            'fechaFin' => 'required'
        ]);
        //Actualiza las tablas de acuerdo al id
        Task::whereId($id)->update($updateData);
        //Regresa al metodo index
        return redirect()->route('tasks.index');
    }


    //METODO PARA ELIMINAR UN EVENTO
    public function destroy($id)
    {
        //Elimina el participante de acuerdo a su id
        Task::destroy($id);
        //Regresa al metodo index
        return redirect()->route('tasks.index');
    }

}
