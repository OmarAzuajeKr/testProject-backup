<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/projects/index.blade.php -->
@extends('layout')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ __('Projects') }}</h1>
        <p class="lead text-dark">Proyectos realizados</p>
        @auth
            <a href="{{ route('projects.create') }}" class="btn btn-primary text-white mb-3">Crear Proyecto</a>
        @endauth
        
        <br>
        @include('partials.session-status')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @forelse ($projects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 mt-4 mx-auto shadow-sm" style="width: 23rem">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->tittle }}" class="card-img-top img-thumbnail mx-auto border-0" style="width: 100px">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $project->tittle }}</h5>
                                    <p class="card-text text-secondary">{{ $project->created_at->format('d/m/Y') }}</p>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary text-white  w-100">Ver Proyecto</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                No hay proyectos para mostrar
                            </div>
                        </div>
                    @endforelse
                </div>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection