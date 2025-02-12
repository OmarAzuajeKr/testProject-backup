@extends('layout')

@section('title', 'Home')


@section('content')
    <h1 class="display-4 text-center">{{__('Welcome')}}</h1>
    <p class="lead text-center">Este es mi pequeño proyecto de practica</p>
    @auth
    <p class="lead text-muted text-center mb-3 fw-bold">Un placer tenerte aqui, {{auth()->user()->name}}</p>   
 
    @endauth
@endsection

