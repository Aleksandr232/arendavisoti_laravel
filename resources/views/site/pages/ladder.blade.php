@extends('site.layouts.main')


@section('title', 'Аренда лестниц: Ваш ключ к безопасной и эффективной работе на высоте | «Аренда высоты»')
@section('description', 'Аренда лестниц от «Аренда высоты» – надежный партнер для выполнения работ на высоте. Широкий выбор лестниц различных типов и моделей для профессионального и домашнего использования. Гарантированная безопасность и качество обслуживания')
@section('keywords', 'аренда лестниц, лестницы на вынос, строительные лестницы, алюминиевые лестницы, деревянные лестницы, лестницы для дома, лестницы для строительства, безопасная работа на высоте')

@section('header_title')
<div class="header-content-ladder my-container">
    <br/>
<h1>Предоставляем в аренду лестницы 3х-секционные раздвижные</h1>
    <p>
        ☑️ Широкий выбор: лестниц различных типов и моделей<br/>
        ☑️ Качество и безопасность: Мы гарантируем высокое качество наших лестниц
        <br/>
        ☑️ Гибкие условия аренды: адаптированные к потребностям клиента<br/>
        ☑️ Принимаем любые формы оплаты (без НДС, с НДС)
        <br/>
    </p>
    <div class="modal_home">
        <form action="{{ route('send')}}" method="post" autocomplete="on">
            @csrf
            <h4 class="modal-title">Рассчитайте стоимость аренды лестницы с доставкой </h4>
            <label>
                <input type="hidden" name="hidden" value="Заявка на строительные леса">
            </label>
            <label>
                <input type="hidden" name="telegram" value="Заявка на обратный звонок">
            </label>
            <label>
                <input type="hidden" name="email" value="Заявка на обратный звонок">
            </label>
            <label>
                <input type="hidden" name="company" value="Заявка на обратный звонок">
            </label>
            <label>
                <input type="hidden" name="address" value="Заявка на обратный звонок">
            </label>
            <label>
                <input type="tel" name="phone" class="input-name__phone mask-phone" placeholder="Введите номер телефона" required>
            </label>
            @php
                use App\Models\RunStr;
                $active = RunStr::all()->first();
            @endphp
            @if($active->is_hcaptcha == 1)
                <div class="checkbox-wrap">
                    <label class="checkbox">
                        @include('site.layouts.hcaptcha')
                    </label>
                </div>
            @else
                <div class="checkbox-wrap">
                    <label class="checkbox">
                        <input type="checkbox" name="checkbox" value="1" checked required>
                        <span class="their-checkbox"></span>
                    </label>
                    <div class="checkbox-content">
                        <p>Нажимая на кнопку «Оставить заявку», вы даёте согласие на <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank" class="modal-doc">обработку своих персональных данных</a></p>
                    </div>
                </div>
            @endif
            <input type="submit" name="submit" value="Получить каталог и прайс" class="modal-btn">
            <svg class="close-modal" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve">
                    <g>
                        <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                            c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                            C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                            s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                    </g>
            </svg>
        </form>
    </div>
</div>
@endsection

@section('content')
    <section id="towers-tour">
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{asset('frontend/img/main/retractable-ladders.webp') }}">
                    <img src="{{ asset('frontend/img/main/retractable-ladders.jpg') }}" width="470" height="470" alt="аренда минитрактора казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <ol>
                    <h3>Максимальная высота 9 и 12 м., <br/> в сложенном состоянии 4 и 4,5 м.</h3>
                    <li>Принимаем любые формы оплаты:<br/>
                        <li>-Наличка</li>
                        <li>-без НДС</li>
                        <li>-с НДС</li>
                    </li>
                </ol>
            </div>
        </div>


    </section>
    <section id="price-towers__tour">
        <div class="price-towers__tour my-container">
            <div class="ptt-call-to-action">
                <h2>Арендовать лестницу</h2>
                <button class="srb-btn btn" data-btn="Заявка на аренду лестницы">Заказать</button>
            </div>
        </div>
    </section>
    <!-- include our-products start -->
    <section id="our-services">
        <div class="our-services__title my-container">
            <h2>Арендуйте у нас</h2>
        </div>
        <div class="our-services my-container">
            <div class="op-main">
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/kasimovykh.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/kasimovykh.webp') }}" width="670" height="350" alt="леса в аренду">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Рамные строительные леса</h2>
                    <a href="{{ route('scaffolding') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('towers_tour') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/main/tower.webp') }}">
                            <img src="{{ asset('frontend/img/main/tower.jpg') }}" width="670" height="350" alt="леса в аренду">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Вышки-туры строительные</h2>
                    <a href="{{ route('towers_tour') }}" class="op-card__link">Подробнее →</a>
                </div>
            </div>
            @include('site.inc.products_additional')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
