<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\TaskParticipant;
use App\Models\Task; 
use Illuminate\Http\Request;

class TaskParticipantController extends Controller
{
    public function index(){
    $union = Participant::all();
    $evento = Task::all();
    $tableunion = TaskParticipant::all();

    /*
    $eventParticipants = TaskParticipant::join('participants', 'participant_task.participant_id', '=', 'participants.id')
        ->join('tasks', 'participant_task.task_id', '=', 'tasks.id')
        ->select('participant_task.*', 'participants.*', 'tasks.*')
        ->get();

    */
    return response()-> view('pages/eventoparticipante', compact('union' , 'evento', 'tableunion' /*'eventParticipants' => $eventParticipants*/));
    }


public function store(Request $request){
    
    $participante = $request->participant;
    $evento = $request->event;
    
    Participant::find($participante)->eventos()->attach($evento);

    return redirect()->route('taskparticipant.index');
    }

}
