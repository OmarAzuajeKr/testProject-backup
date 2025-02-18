@extends('layout')

@section('title', 'Vista Previa | ' . $project->tittle)

@section('content')
    <div class="containerContact">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('projects.deleteList') }}" class="btn btn-secondary text-white mb-3">Regresar</a>
                @include('partials.session-status')
                <div class="bg-white shadow rounded py-3 px-4">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid" alt="{{ $project->tittle }}">
                    @endif
                    <h1 class="titleContact">{{ $project->tittle }}</h1>
                    @if ($project->category)
                    <a href="{{ route('categories.show', $project->category) }}"
                        class="badge bg-primary text-white">{{ $project->category->name }}</a>
                    @endif
                    <p class="lead text-muted">{{ $project->description }}</p>
                    <p class="text-muted">{{ $project->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection