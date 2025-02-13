<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/projects/create.blade.php -->
@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
    <div class="containerContact">
        <div class="row">
            <div class="col-12">
                <h1 class="titleContact">Crear Proyecto</h1>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary text-white mb-3">Regresar</a>
                @include('partials.session-status')
                @include('partials.validation-errors')
                <form 
                method="POST" 
                enctype="multipart/form-data"
                action="{{ route('projects.store') }}" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    @include('projects.form')
                    <button class="btn btn-primary text-white w-100">Crear</button>
                </form>
            </div>
        </div>
    </div>
@endsection