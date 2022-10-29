@extends('layout')
@section('cssName', 'elementos')
@section('title', 'Trabajos Realizados')
@section('content')
    <h2>Trabajos Realizados</h2>
    <div class="elementos">
        @if (isset($elements))
        @foreach ($elements as $element)
            <div class="elementos__elemento {{ $element->url }}" title="{{ $element->title }}" data-title="{{ $element->url }}">
                <a href="{{route('trabajos.description', $element->url)}}">
                    <img src="{{asset('img/uploads')}}/{{$element->pathImg}}/{{$element->img}}" alt="{{$element->title}}">
                    <h3>{{$element->title}}</h3>
                </a>
            </div>
        @include('partials.form-edit', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo de la elemento']]], 'routeName' => 'trabajos', "var" => $element])
        @endforeach
        @endif
        @include('partials.form-create', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo del elemento']]], 'routeName' => 'trabajos'])
    </div>
    @includeFirst(['partials.pagination', 'model'], ['model' => $elements
    ])
@endsection