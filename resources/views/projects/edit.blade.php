@extends('layout')

@section('title', 'Editar Proyecto')

@section('content')
    <h1>Editar Proyecto</h1>

    <a href="{{ route('projects.index') }}">Regresar</a>

    @include('partials.session-status')

    @include('partials.validation-errors')



    <form method="POST" action="{{ route('projects.update', $project) }}">
        @method('PATCH')
        @include('projects.form')
        <button>Actualizar</button>
    </form>
@endsection
