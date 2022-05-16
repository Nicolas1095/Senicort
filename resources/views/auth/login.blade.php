@extends('layout')
@section('cssName', 'login')
@section('title', 'Iniciar Sesion')
@section('content')
<div class="login">
    <h2>Iniciar Sesion</h2>
    <div class="form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" class="">Email</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            <label for="password" class="">Contraseña</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            <div class="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Recuardame</label>
            </div>

            <button type="submit">Iniciar Sesion</button><br>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
            @endif
        </form>
    </div>
@endsection
