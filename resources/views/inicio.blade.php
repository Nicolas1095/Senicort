@extends('layout')
@section('title', 'Incio')
@section('cssName', 'inicio')
@section('content')
        <div class="portada">
            <div class="portada__texto">
                <div class="portada__texto--animation">
                    <ul>
                        <li>Alfombras</li>
                        <li>y</li>
                        <li>Cortinas</li>
                    </ul>
                </div><a href="{{ route('cortinas.modelos') }}">Ver más</a>
            </div>
        </div>
@endsection
