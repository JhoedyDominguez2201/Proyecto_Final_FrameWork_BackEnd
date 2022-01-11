@extends('layouts.app')

@section('content')


<style>
    h1 {text-align: center;
        font-family: "Times New Roman";
        position: relative; 
        top:180px; 
    }
</style>

<h1 class="center">BIENVENIDO</h1>
<h1>{{ Auth::user()->name}}</h1>





@endsection
