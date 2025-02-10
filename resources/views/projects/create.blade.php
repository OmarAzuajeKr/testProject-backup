
@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
    <h1>Crear Proyecto</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>
            Titulo del proyecto <br>
            <input type="text" name="tittle">
        </label> 
        <br> 
        <label>
            Descripcion <br>
            <textarea name="description"></textarea>
        </label> 
        <br>
        <button>Crear</button>
    </form>
@endsection