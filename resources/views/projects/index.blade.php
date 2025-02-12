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
            <div class="col-md-8">
                <ul class="list-group">
                    @forelse ($projects as $project)
                        <li class="list-group-item d-flex justify-content-between border-0 mb-2 shadow-sm">
                            <a class="text-decoration-none d-flex justify-content-between w-100" href="{{ route('projects.show', $project->id) }}">
                                <span class="font-weight-bold text-primary">
                                    {{ $project->tittle }}
                                </span>
                                <span class="text-secondary text-right font-weight-light">
                                    {{ $project->created_at->format('d/m/Y') }}
                                </span>
                            </a>
                        </li>
                    @empty
                        <li class="list-group-item d-flex justify-content-between border-0 mb-2 shadow-sm">
                            No hay proyectos para mostrar
                        </li>
                    @endforelse
                    {{ $projects->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection