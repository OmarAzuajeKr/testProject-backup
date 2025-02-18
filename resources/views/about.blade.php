@extends('layout')

@section('title', 'About')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 about-title">{{ __('About Me') }}</h1>
                <div class="about-container">
                    <p class="lead text-dark text-left">
                        Mi nombre es <strong>Omar</strong>, soy un desarrollador de software nuevo en el mundo de la
                        programación. Hice este proyecto para aprender sobre el desarrollo de aplicaciones web con
                        Laravel. Espero sea de su gusto. Poco a poco ire actualizando este apartado para que
                        conozcan más sobre mi.
                    </p>      
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/Omar Azuaje.jpeg') }}" class="imagen-about" alt="Programador">
            </div>
        </div>
    </div>
@endsection