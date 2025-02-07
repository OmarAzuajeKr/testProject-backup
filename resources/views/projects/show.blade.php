@extends('layout')

@section('title', 'Portafolio|'. $project->tittle)

@section('content')

<h1>{{$project->tittle}}</h1>

<p>{{$project->description}}</p>

<p>{{$project->created_at->diffForHumans()}}</p>

@endsection