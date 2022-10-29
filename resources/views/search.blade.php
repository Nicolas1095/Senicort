@extends('layout')
@section('cssName', 'elementos')
@section('title', $request->search)
@section('content')
<h2>Resultados de busqueda para: {{ $request->search }}</h2>
    
@if (isset($elements))
    <div class="elementos">
        @foreach ($elements as $element)
        @foreach ($element as $elemento)    
        <div class="elementos__elemento {{ $elemento->url }}"title="{{ $elemento->title }}" data-title="{{ $elemento->url }}">
            <img src="{{ asset('img/uploads') }}/{{$elemento->pathImg}}/{{ $elemento->img }}" alt="{{ $elemento->img }}">
            <h3>{{ $elemento->title }}</h3>
        </div>
        @endforeach
        @endforeach
        @endif
    </div>
@endsection