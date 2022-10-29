@extends('layout')
@section('cssName', 'contacto')
@section('title', 'Contacto')
@section('content')
<div class="contacto">
    <div class="form">
        <h2>Contacto</h2>
        <form method="post" action="{{route('contacto.send')}}">
            @csrf
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}">
            <label for="phone">Numero de telefono:</label>
            <input type="num" name="phone" id="phone" value="{{old('phone')}}">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">
            <label for="mensaje">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" rows="10">{{old('mensaje')}}</textarea>
            <button type="submit">Enviar</button>
        </form></div>
    </div>
</div>
@endsection
