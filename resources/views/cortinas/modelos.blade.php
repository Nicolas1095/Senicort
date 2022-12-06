@extends('layout')
@section('cssName', 'elementos')
@section('title', 'Cortinas')
@section('content')
<h2>Modelos</h2>

@if (isset($models))
    <div class="elementos">
        @include('partials.form-create', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo del modelo']]], 'routeName' => 'modelos'])
        @foreach ($models as $model)
        <div class="elementos__elemento {{ $model->url }}" title="{{ $model->title }}" data-title="{{ $model->url }}">
            <a href="{{ route('cortinas.description', $model->url) }}">
                <img src="{{ asset('img/uploads') }}/{{$model->pathImg}}/{{ $model->img }}" alt="{{ $model->img }}">
                <h3>{{ $model->title }}</h3>
            </a>
        </div>
        @include('partials.form-edit', ["variables"=>['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo del modelo']]], 'routeName' => 'modelos', "var" => $model])
        @endforeach
        @endif
    </div>
    @includeFirst(['partials.pagination', 'model'], ['model' => $models])
@endsection
