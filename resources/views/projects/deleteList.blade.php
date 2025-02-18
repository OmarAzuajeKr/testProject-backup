@extends('layout')

@section('title', 'Proyectos Eliminados')

@section('content')
    <div class="container">
        <h1 class="delete-list-title">Proyectos Eliminados</h1>
        @can('view-deleted-projects', $newProject)
            <div class="scrollable-list">
                <ul class="list-group mt-4">
                    @foreach ($deletedProjects as $deletedProject)
                        <div class="col-md-12 mt-4 mb-4 text-center fw-bold">
                            <li class="list-group-item text-danger border-0 bg-light shadow-sm mt-2">
                                {{ $deletedProject->tittle }}
                                <p class="card-text text-secondary">{{ $deletedProject->created_at->format('d/m/Y') }}</p>
                                <a href="{{ route('projects.showPreview', $deletedProject->id) }}" class="btnPreview">Vista Previa</a>
                                @can('restore', $deletedProject)
                                    <form id="restore-project-{{ $deletedProject->id }}"
                                        action="{{ route('projects.restore', $deletedProject->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-secondary text-white">Restaurar</button>
                                    </form>
                                @endcan
                                @can('forceDelete', $deletedProject)
                                    <form id="force-delete-project-{{ $deletedProject->id }}"
                                        action="{{ route('projects.forceDelete', $deletedProject->id) }}" class="d-inline"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de querer eliminar este proyecto? Esta acción no se puede deshacer')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary text-white">Eliminar permanentemente</button>
                                    </form>
                                @endcan
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        @endcan
        <div class="col-md-12 mt-4 mb-4 text-center">
            <a href="{{ route('projects.index') }}" class="btn btn-primary text-white mt-3">Regresar al portafolio</a>
        </div>
    </div>
@endsection