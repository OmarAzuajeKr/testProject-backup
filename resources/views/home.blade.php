@extends('layout')

@section('title', 'Home')

@section('content')
    <h1 class="display-4 text-center">{{ __('Welcome') }}</h1>
    <p class="lead text-center">Este es mi pequeño proyecto de práctica</p>
    @auth
        <p class="lead text-muted text-center mb-3 fw-bold">Un placer tenerte aquí, {{ auth()->user()->name }}</p>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/Programador.svg') }}" class="Programador" alt="Programador">
                </div>
            </div>
        </div>
    @endauth
@endsection