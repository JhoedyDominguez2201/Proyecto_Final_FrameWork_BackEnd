<?php

use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskParticipantController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::Resource('eventos' ,TaskController::class)->names('tasks')->middleware('auth');; 

Route::Resource('participante' ,ParticipantController::class)->names('participants')->middleware('auth');; 

Route::Resource('eventoparticipante' ,TaskParticipantController::class)->names('taskparticipant')->middleware('auth');; 

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
