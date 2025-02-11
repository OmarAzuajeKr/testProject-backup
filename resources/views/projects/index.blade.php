@extends('layout')

@section('title', 'Projects')

@section('content')
    <h1>{{__('Projects')}}</h1>
    <a href="{{ route('projects.create') }}">Crear Proyecto</a>
    <br>
    @include('partials.session-status')
    <ul>
        @forelse ($projects as $project)
            <li><a href="{{ route('projects.show', $project->id) }}"><strong>{{ $project->tittle }}</strong></a></li>
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
        {{ $projects->links() }}
    </ul>
@endsection