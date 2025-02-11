@extends('layout')

@section('title', 'Contacto')



@section('content')
    <h1>{{ __('Contact') }}</h1>

    @include('partials.session-status')

    <p>Formulario de contacto</p>
    <form method="POST" action="{{ route('contact') }}">
        @csrf
        <input type="text" name="name" placeholder="Nombre..." value="{{ old('name') }}"><br>
        {{ $errors->first('name') }}<br>
        <input type="email" name="email" placeholder="Email..." value="{{ old('email') }}"><br>
        {{ $errors->first('email') }}<br>
        <input type="text" name="subject" placeholder="Asunto..." value="{{ old('subject') }}"><br>
        {{ $errors->first('subject') }}<br>
        <textarea name="content" placeholder="Mensaje..." value="{{ old('content') }}"></textarea><br>
        {{ $errors->first('content') }}<br>
        <button>Enviar</button>
    </form>
@endsection
