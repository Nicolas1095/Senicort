@extends('layout')
@section('cssName', 'elementos')
@section('title', 'Catalogo')
@section('content')
    <h2>Catalogo</h2>
    <div class="elementos">
        @if (isset($elements))
        @foreach ($elements as $element)
            <div class="elementos__elemento {{ $element->url }}" title="{{ $element->title }}" data-title="{{ $element->url }}">            
                <a href="{{route('galeria.description', $element->url)}}">
                    <img src="{{asset('img/uploads')}}/{{$element->pathImg}}/{{$element->img}}" alt="{{$element->img}}">
                    <h3>{{$element->title}}</h3>
                </a>
            </div>
        @include('partials.form-edit', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo de la imagen']]], 'routeName' => 'galeria', "var" => $element])
        @endforeach
        @endif
        @include('partials.form-create', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo del imagen']]], 'routeName' => 'galeria'])
    </div>
    @includeFirst(['partials.pagination', 'model'], ['model' => $elements])
@endsection