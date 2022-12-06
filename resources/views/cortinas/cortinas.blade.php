@extends('layout')
@section('cssName', 'elementos')
@section('title', $courtian->title)
@section('content')
<h2>Cortinas</h2>
<h5><a href="{{ route('cortinas.modelos') }}">· Modelos ·</a></h5>
<div class="elementos">
    @includeFirst(['partials.form-create', 'inputs'], ['variables' => ['inputs' => ['input1'=>['name' => 'title', 'labelName' => 'Titulo de la cortina']]],'modelCourtain' => $model, 'routeName' => 'cortinas'])
    @if (isset($courtains))
    @foreach ($courtains as $courtain)
    <div class="elementos__elemento">
        <a href="{{ route('cortinas.description', array($courtain['model'], $courtain['url']))}}">
            <img src=" {{ asset('img/uploads') }}/{{$courtain['pathImg']}}/{{ $courtain['img'] }}" alt=""><h3>{{ $courtain['title'] }}</h3>
            <h6>{{ $courtian->title }}</h6>
        </a>
    </div>
    @endforeach
    @endif
</div>
@includeFirst(['partials.pagination', 'model'], ['model' => $courtains])

@endsection
