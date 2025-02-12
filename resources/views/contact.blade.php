<!-- filepath: /c:/Users/analista.desarrollo/Downloads/testProject/testProject/resources/views/contact.blade.php -->
@extends('layout')

@section('title', 'Contacto')

@section('content')
    <div class="container">
        <h1>{{ __('Contact') }}</h1>
        @include('partials.session-status')
        <p class="lead text-muted">Formulario de contacto</p>
        <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('contact') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nombre</label> 
                <input class="form-control bg-light shadow-sm border-0 @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Nombre..." value="{{ old('name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input class="form-control bg-light shadow-sm border-0 @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email..." value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="subject">Asunto</label>
                <input class="form-control bg-light shadow-sm border-0 @error('subject') is-invalid @enderror" type="text" id="subject" name="subject" placeholder="Asunto..." value="{{ old('subject') }}">
                @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="content">Mensaje</label>
                <textarea class="form-control bg-light shadow-sm border-0 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Mensaje...">{{ old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>
@endsection