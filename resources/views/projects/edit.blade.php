<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/projects/edit.blade.php -->
@extends('layout')

@section('title', 'Editar Proyecto')

@section('content')
    <div class="containerContact">
        <div class="row">
            <div class="col-12">
                <h1 class="titleContact">Editar Proyecto</h1>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary text-white mb-3">Regresar</a>
                @include('partials.session-status')
                @include('partials.validation-errors')
                <form method="POST" enctype="multipart/form-data" action="{{ route('projects.update', $project) }}" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    @method('PATCH')
                    @include('projects.form', ['categories' => $categories])
                    <button class="btn btn-primary text-white w-100 mt-3">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection