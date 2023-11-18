@if(auth()->check() && auth()->user()->is_admin)
    <a href="{{ route('admin') }}" class="security"></a>
@elseif(auth()->check() && auth()->user()->is_director)
    <a href="{{ route('director') }}" class="security"></a>
@elseif(auth()->check())
    <a href="{{ route('logout') }}" class="security"></a>
@else
    <a href="{{ route('login') }}" class="security"></a>
@endif
<div id="runningString"><a class="stocks" href="">Акция: 20% сезонная скидка на наши услуги</a></div>
<div class="header-contacts">
    <div class="hc-content my-container">
        <address>
            <img src="{{ asset('frontend/img/icons/location.svg') }}" width="16" height="16" alt="леса в аренду">
            РТ, г. Казань, ул. Мирхайдара Файзи 68
        </address>
        <div class="header-phone">
            <a class="number_theme" href="tel:+79867120059">8 986 712-00-59</a>
            <a href="https://wa.me/+79867120059" title="Напишите нам в Whatsapp" target="_blank">
                <img src="{{ asset('frontend/img/icons/whatsapp.svg') }}" width="20" height="20" alt="леса в аренду">
            </a>
        </div>
    </div>
</div>
<div class="header-navigation">
    <div class="hn-content my-container">
        @if(!Request::is('/'))
            <a href="/" class="hn-logo" id="hn-logo" title="Аренда оборудования для работ на высоте">
                <img src="{{ asset('frontend/img/logotype.svg') }}" width="280" height="53" alt="логотип аренды высоты">
            </a>
        @else
            <a class="hn-logo" title="Аренда оборудования для работ на высоте">
                <img src="{{ asset('frontend/img/logotype.svg') }}" width="280" height="53" alt="леса в аренду">
            </a>
        @endif
        <div class="hn-navbar">
            <div class="hn-navbar__burger__btn">
                <div class="hn-navbar__burger__title">Меню</div>
                <div class="hn-navbar__burger">
                    <span></span>
                </div>
            </div>
            <ul class="hn-navbar__menu">
                @include('site.inc.menu')
            </ul>
            <button class="hn-navbar__btn btn" data-btn="Заявка на обратный звонок">
                <img class='phone_theme'  src="{{ asset('frontend/img/icons/phone.svg') }}" width="30" height="30" alt="вы можете позвонить в компаню аренда высоты">
            </button>
            <button class="theme-btn">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
            </button>
            <button onclick="openModalCard()" id="card-btn">
                <i class='fa fa-shopping-bag'></i>
            </button>
        </div>
    </div>
</div>
