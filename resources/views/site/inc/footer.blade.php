<footer class="my-footer">
    <div class="mf-container my-container">
        <div class="mf-nav">
            <h3>Меню</h3>
            <ul class="mf-nav__menu">
                @include('site.inc.menu')
            </ul>
        </div>
        <div class="mf-appeal">
            <h3>Позвоните нам, и мы ответим на все вопросы</h3>
            <div class="mf-appeal__phone">
                <a href="tel:+79867120059">8 986 712-00-59</a>
            </div>
        </div>
        <div class="mf-address">
            <h3>Контакты</h3>
            <address>
                <img src="{{ asset('frontend/img/icons/location.svg') }}" width="16" height="16" alt="леса в аренду">
                РТ, г. Казань, ул. Мирхайдара Файзи, 68
            </address>
            <div class="mf-social__networks">
                <a href="https://wa.me/+79867120059"  title="Напишите нам в Whatsapp" target="_blank">
                    <img src="{{ asset('frontend/img/icons/whatsapp.svg') }}" width="23" height="23" alt="леса в аренду">
                </a>
                <a href="https://www.instagram.com/arenda_visoti" title="Мы в Instagram" target="_blank">
                    <img src="{{ asset('frontend/img/icons/instagram.svg') }}" width="23" height="23" alt="леса в аренду">
                </a>
                <a href="https://vk.com/arenda_visoti" title="Мы ВКонтакте" target="_blank">
                    <img src="{{ asset('frontend/img/icons/vk.svg') }}" width="23" height="23" alt="леса в аренду">
                </a>
                <a href="https://t.me/HireHeightsbot" title="Напиши боту" target="_blank">
                    <img src="{{ asset('frontend/img/icons/telegram.svg') }}" width="24" height="24" alt="леса в аренду">
                </a>
            </div>
        </div>
    </div>
    <div class="mf-bottom">
        <div class="author">
            <a id="resume" href="http://artzakirov.ru">Сайт разработан</a>
            <a  id="me_site" href="https://newportfolio-sooty-kappa.vercel.app/">Подджержка сайта</a>
        </div>
        <div class="footer-doc">
            <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank">Политика конфиденциальности</a>
            <a href="{{ asset('frontend/doc/terms.pdf') }}" rel="nofollow" target="_blank">Пользовательское соглашение</a>
        </div>
        <div class="data-footer">
            @if(date('Y') == '2021')
             2021
        @else
              2021 - {{ date('Y') }}
        @endif
        <br/>©  ООО "АРЕНДА ВЫСОТЫ"
        </div>
    </div>
</footer>
