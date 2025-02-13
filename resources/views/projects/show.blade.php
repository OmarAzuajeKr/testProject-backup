<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/projects/show.blade.php -->
@extends('layout')

@section('title', 'Portafolio | ' . $project->tittle)

@section('content')
    <div class="containerContact">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Regresar</a>
                @include('partials.session-status')
                <div class="bg-white shadow rounded py-3 px-4">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid" alt="{{ $project->tittle }}">
                    @endif
                    <h1 class="titleContact">{{ $project->tittle }}</h1>
                    <p class="lead text-muted">{{ $project->description }}</p>
                    <p class="text-muted">{{ $project->created_at->diffForHumans() }}</p>
                    <div class="containerButton">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary mb-3">Editar</a>
                    <form method="POST" action="{{ route('projects.destroy', $project) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Eliminar</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection