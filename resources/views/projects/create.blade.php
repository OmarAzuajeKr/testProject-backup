@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
    <h1>Crear Proyecto</h1>

    <a href="{{ route('projects.index') }}">Regresar</a>
    
    @include('partials.session-status')

    @include ('partials.validation-errors')

    <form method="POST" action="{{ route('projects.store') }}">
        @include('projects.form')
        <button>Crear</button>
    </form>
@endsection
