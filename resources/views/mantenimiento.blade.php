@extends('layout')
@section('cssName', 'elementos')
@section('title', 'Mantenimiento y Reparación')
@section('content')
<h2>Mantenimiento y Reparación</h2>
<div class="elementos">
    @include('partials.form-create', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo del elemento']]], 'routeName' => 'mantenimiento'])
    @if (isset($mantenimientos))
    @foreach ($mantenimientos as $mantenimiento)
            <div class="elementos__elemento {{ $mantenimiento->url }}" title="{{ $mantenimiento->title }} data-title="{{ $mantenimiento->url }}">
                <a href="{{route('mantenimiento.description', $mantenimiento->url)}}">
                    <img src="{{asset('img/uploads')}}/{{$mantenimiento->pathImg}}/{{$mantenimiento->img}}" alt="{{$mantenimiento->title}}">
                    <h3>{{$mantenimiento->title}}</h3>
                </a>
            </div>
        @include('partials.form-edit', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo de la elemento']]], 'routeName' => 'mantenimiento', "var" => $mantenimiento])
        @endforeach
        @endif
    </div>
    @includeFirst(['partials.pagination', 'model'], ['model' => $mantenimientos
    ])
@endsection
