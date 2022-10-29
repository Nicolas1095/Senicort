@extends('layout')
@section('cssName', 'about')
@section('title', 'Sobre Nosotros')
@section('content')
        <div class="about">
            <div class="slideshow">
                <ul class="slider">
                    <li><img src="img/mantenimiento_1.jpg" alt=""></li>
                    <li><img src="img/mantenimiento_2.jpg" alt=""></li>
                    <li><img src="img/mantenimiento_3.jpg" alt=""></li>
                    <li><img src="img/mantenimiento_4.jpg" alt=""></li>
                    <li><img src="img/mantenimiento_5.jpg" alt=""></li>
                </ul>
                <div class="left"><i class="fas fa-chevron-left"></i></div>
                <div class="right"><i class="fas fa-chevron-right"></i></div>
                <ol class="pagination">
                </ol>
            </div>
            <div class="text">
                <h2>Sobre Nosotros</h2>
                <p>
                    <li>Somos una empresa líder en el mercado ecuatoriano de cortinas y persianas.</li>
                    
                    <li>Nuestro éxito está en saber conjugar líneas modernas y lo tradicional, logrando garantizar comodidad y bienestar anuestros clientes.</li>
                    
                    <li>Contamos con más de 21 años de experiencia a nivel institucional, empresarial y doméstico.</li>
                    
                    <li>Entendemos el protagonismo e importancia que tienen la comodidad y el buen gusto a la hora de decorar y dar acabados acualquier ambiente. Por eso, brindamos siempre lo mejor en diseño, calidad, variedad de texturas, colores y durabilidad.</li>
                    
                    <li>Asesoramos tu buen gusto.</li>
                </p>
            </div>
        </div>
@endsection