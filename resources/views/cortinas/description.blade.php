@extends('layout')
@section('cssName', 'descripcion')
@section('title', $element->title)
@section('content')
<div class="descripcion">
    <div class="buttons">
        <span><a href="{{ URL::previous() }}"><i class="fas fa-chevron-left"></i></a></span>
        @auth
        <div class="buttons_admin">
            <span><i  class="fas fa-pen buttonEdit buttonIcon"></i></a></span>
            <span class="buttonDelete"><a href="#"><i style="display: none" class="fas fa-trash buttonIcon"></i></a></span>
            @include('partials.form-delete', ["variables" => ['routeName' => $routeName, 'element' => $element]])
        </div>
        @endauth
    </div>
    <div class="ctn__content">
        <div class="text">
            <img src="{{asset('img/uploads')}}/{{$element['pathImg']}}/{{$element['img']}}" alt="{{$element['img']}}" class="imgCourtain">
            <div class="text_content">
                <h2>{{$element['title']}}</h2>
                <div class="text_content__description">
                    {!! $element['description'] !!}
                </div>
                <a href="https://api.whatsapp.com/send?phone=593986356506" class="sendMessage" target="_blank">Cotizar</a>
            </div>
        </div>
        @auth
    <div class="formEdit disabled"  id="{{ $element->url }}">
        <form action="{{ route($routeName.'.update.'.$routeName, $element->url) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="formEdit__img">
                <div class="wrap-custom-file">
                    <input id="img{{$element->id}}" type="file" class="inputImg" name="img" accept=".jpg">
                    <label for="img{{$element->id}}" title="Selecciona una imagen" class="file-ok" style="background-image: url({{ asset('img/uploads') }}/{{$element->pathImg}}/{{ $element->img }}" alt="{{ $element->img }})">
                        <span>{{ $element->img }}</span>
                    </label>
                </div>
            </div>
            <div class="formEdit__text">
                <input type="text" name="title" id="title" value="{{ $element->title }}">
                <textarea name="ckeditor">
                    @isset($element['description'])
                    {!! $element['description'] !!}
                    @endisset
                </textarea>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endauth
      
    </div>
</div>
@endsection