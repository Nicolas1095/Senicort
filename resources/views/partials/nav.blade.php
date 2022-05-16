<div class="header__menu">
    <nav>
        <ul>
            <li><a href=" {{ route('inicio') }} " class=" {{ setActive('inicio') }} ">Incio</a></li>
            <li><a href=" {{ route('cortinas.modelos') }} " class=" {{ setActive('cortinas.*') }} ">Cortinas</a></li>
            <li><a href=" {{ route('galeria') }}" class=" {{ setActive('galeria.*','galeria') }} ">Catalogo</a></li>
            <li><a href=" {{ route('contacto') }}" class=" {{ setActive('contacto') }} ">Contacto</a></li>
            <li><a href=" {{ route('mantenimiento') }} " class=" {{ setActive('mantenimiento.*','mantenimiento') }} ">Mantenimiento y reparación</a></li>
            <li><a href=" {{ route('trabajos') }}" class=" {{ setActive('trabajos.*','trabajos') }} ">Trabajos realizados</a></li>
            <li><a href=" {{ route('about') }}" class=" {{ setActive('about') }} ">Sobre nosotros</a></li>
        </ul>
    </nav>
    <div class="down"><i class="fas fa-chevron-down"></i></div>
</div>