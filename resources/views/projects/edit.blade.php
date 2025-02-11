
@extends('layout')

@section('title', 'Editar Proyecto')

@section('content')
    <h1>Editar Proyecto</h1>

@include('partials.validation-errors')



    <form method="POST" action="{{ route('projects.update', $project) }}">
        @method('PATCH')
        @include('projects.form')
        <button>Actualizar</button>
    </form>
@endsection