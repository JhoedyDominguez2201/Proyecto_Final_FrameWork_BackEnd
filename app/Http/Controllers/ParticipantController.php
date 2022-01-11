<?php

namespace App\Http\Controllers;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
     
    //METODO PARA MOSTRAR LOS PARTICIPANTES DE LA BASE DE DATOS EN LA VISTA
    public function index()
    {
        //Consulta
        $participants = Participant::all();
        //Regresa a la vista que se encuentra en esa url junto con la variable
        return response()-> view('pages/participante', compact('participants'));
    }

    //METODO PARA CREAR UN PARTICIPANTE
    public function store(Request $request)
    {
        //Validamos los parametros
        $request->validate([
            'nombres' => 'required',
            'apellidopaterno' => 'required',
            'apellidomaterno' => 'required',
            'genero' => 'required',
            'email' => 'required'
        ]);

        //Creamos el nuevo participante 
        Participant::create($request->all());
        //Regresa al metodo index
        return redirect()->route('participants.index');

    }
    
    //METODO PARA EDITAR UN PARTICIPANTE
    public function edit($id)
    {    
        //Busca que exista un participante con ese id
        $participant = Participant::findOrFail($id);
        return view('pages/update', compact('participant'));
    }

     //METODO PARA ACTUALIZAR UN PARTICIPANTE
    public function update(Request $request, $id)
    {
        //Validamos los parametros
        $updateData = $request->validate([
            'nombres' => 'required',
            'apellidopaterno' => 'required',
            'apellidomaterno' => 'required',
            'genero' => 'required',
            'email' => 'required'
        ]);
        //Actualiza las tablas de acuerdo al id
        Participant::whereId($id)->update($updateData);
        //Regresa al metodo index
        return redirect()->route('participants.index');
    }
    

    //METODO PARA ELIMINAR UN EVENTO
    public function destroy($id)
    {
        //Elimina el participante de acuerdo a su id
        Participant::destroy($id);
        //Regresa al metodo index
        return redirect()->route('participants.index');
    }

}
