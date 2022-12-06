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
    <meta name="description" content="Venta y Reparacion de Cortinas y Alfombras en Quito.">
    <meta name="keywords"
        content="cortinas, reparacion de cortinas, cortinas, quito, alfombras, senicort, mantenimiento de cortinas, lavado" />
    <title>Senicort | @yield('title')</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N3XGFPN');
    </script>
    <!-- End Google Tag Manager -->
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
                <form action="{{ route('search') }}" method="get">
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
    @include('partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/TextPlugin.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FMHNRMC0WL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FMHNRMC0WL');
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3XGFPN" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-699481979"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-699481979');
    </script>
    <script src=" {{ asset('js/script.js') }} "></script>
</body>

</html>
