<footer>
    <div class="fixed_footer">
        <a href="https://api.whatsapp.com/send?phone=593986356506" target="_blank"><i
                class="fab fa-whatsapp float-button"></i></a>
        <span class="warning p-2 footer_alert"><strong>20% de descuento hasta el 31 de Diciembre</strong><i class="fas fa-times closeAlert"></i></span>
    </div>
    <div class="ctn-footer">
        <div class="redes">
            <a href="https://www.facebook.com/Cortinas-y-alfombras-Senicort-160185168025056" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/edisongalarraga2017/" target="_blank"><i
                    class="fab fa-instagram"></i></a>
            <a href="https://api.whatsapp.com/send?phone=593986356506" target="_blank"><i
                    class="fab fa-whatsapp"></i></a>
        </div>
        <div class="copyright">
            <h4>&copy; Copyright Senicort Todos los derechos reservados</h4>
        </div>
        @guest
            <a href="{{ route('login') }}">Sistema Administracion</a>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button style="cursor: pointer; border:none; background:none; color: var(--color-amarillo)"
                    type="submit">Cerrar Sesion</button>
            </form>
        @endauth
    </div>
</footer>
