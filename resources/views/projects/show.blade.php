
@extends('layout')

@section('title', 'Portafolio | ' . $project->tittle)

@section('content')

<a href="{{ route('projects.index') }}">Regresar</a>

<h1>{{ $project->tittle }}</h1>

<p>{{ $project->description }}</p>

<p>{{ $project->created_at->diffForHumans() }}</p>

<br>

<br>

<a href="{{ route('projects.edit', $project) }}">Editar</a>

<form method="POST" action="{{ route('projects.destroy', $project) }}">
    @csrf @method('DELETE')
    <button>Eliminar</button>


@endsection