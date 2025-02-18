@extends('layout')

@section('title', 'Projects')

@section('content')
    <div class="container">
        @isset($category)
            <div>
                <h1 class="display-4">{{ $category->name }}</h1>
                <a href="{{ route('projects.index') }}" class="btn btn-primary text-white mb-3">Regresar al portafolio</a>
            </div>
        @else
            <h1 class="display-4">{{ __('Projects') }}</h1>
        @endisset
        <p class="lead text-dark">Proyectos realizados</p>
        @can('create', $newProject)
            <a href="{{ route('projects.create') }}" class="btn btn-primary text-white mb-3">Crear Proyecto</a>
        @endcan

        <br>
        @include('partials.session-status')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @forelse ($projects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 mt-4 mx-auto shadow-sm" style="width: 23rem">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->tittle }}"
                                        class="card-img-top img-thumbnail mx-auto border-0" style="width: 100px">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-primary">{{ $project->tittle }}</h5>
                                    <p class="card-text text-secondary">{{ $project->created_at->format('d/m/Y') }}</p>

                                    @if ($project->category)
                                        <a href="{{ route('categories.show', $project->category) }}"
                                            class="badge bg-primary text-white">{{ $project->category->name }}</a>
                                    @endif
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-primary text-white w-100 mt-3">Ver Proyecto</a>
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
            @auth
            <a href="{{ route('projects.deleteList') }}" class="btn btn-danger text-white mt-3">Ver proyectos eliminados</a>
            @endauth
        </div>
    </div>
@endsection