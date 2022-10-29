<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <script src="https://kit.fontawesome.com/f7cea812e2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/') }}/@yield('cssName').css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <meta name="description" content="Venta y Reparacion de Cortinas y Alfombras en Quito.">
    <meta name="keywords" content="cortinas, reparacion de cortinas, cortinas, quito, alfombras, senicort, mantenimiento de cortinas, lavado" />
    <title>Senicort | @yield('title')</title>
</head>
<body>
    @if ($errors->any())
    <ul class="alert">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}<i class="fas fa-times closeAlert"></i></li>
        @endforeach
    </ul>
    @endif
    @if (session('message'))
        <div class="alert">
            <li class="correct">{{ session('message') }}<i class="fas fa-times closeAlert"></i></li>
        </div>
    @endif
    <header>
        <div class="header__principal">
            <div class="header__principal--ctn">
                <h1><a href=" {{ route('inicio') }} ">Senicort</a></h1>
                <form action="{{route('search')}}" method="get">
                    <input type="text" placeholder="¿Qué desea buscar?" name="search" id="search">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        @include('partials.nav')
    </header>
    <div class="ctn-all">
    @yield('content')
    </div>
</body>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-699481979"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-699481979');
</script>
<div id="fb-root"></div><div id="fb-customer-chat" class="fb-customerchat"></div><script>var chatbox=document.getElementById('fb-customer-chat'); chatbox.setAttribute("page_id", "160185168025056"); chatbox.setAttribute("attribution", "biz_inbox"); window.fbAsyncInit=function(){ FB.init({ xfbml : true, version : 'v11.0'});}; (function(d, s, id){ var js, fjs=d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js=d.createElement(s); js.id=id; js.src='https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js'; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
    @include('partials.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=" {{ asset('js/script.js') }} "></script>
</html>
