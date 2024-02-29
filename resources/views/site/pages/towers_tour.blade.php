@extends('site.layouts.main')

@section('title', 'Аренда вышки-туры Казань')
@section('description', 'Предлагаем в аренду передвижные строительные вышки-туры с доставкой по Казани по самым выгодным ценам «Аренда высоты»')
@section('keywords', 'вышка тура строительная сборно разборная, туры вышки, аренда строительной туры, строительные туры, вышка тура в аренду')

@section('header_title')
<div class="header-content-tours my-container">
    <br/>
<h1>Аренда вышки-туры в Казани с доставкой от 2-х часов</h1>
<p>
☑️ Передвижные строительные вышки-туры «Балатон» высотой от 2-х до 21,3 м<br/>
☑️ Вышка-тура «Балатон» отличается устойчивостью и безопасностью<br/>
☑️ Подходит для наружных и внутренних строительных работ<br/>
☑️ Подходит для наружных и внутренних строительных работ<br/>
<br/>
<br/><br/>
</p>
<div class="modal_tours">
    <form action="{{ route('send')}}" method="post" autocomplete="on">
        @csrf
        <h4 class="modal-title">Получите каталог и прайс на аренду за 1 минуту </h4>
        <label>
            <input type="hidden" name="hidden" value="Заявка на вышки-туры">
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
                    <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/balton-1.webp') }}">
                    <img src="{{ asset('frontend/img/tour-towers/balton-1.jpg') }}" width="670" height="350" alt="аренда вышки-туры казань" title="вышки-туры казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <h2>Балатон 0,6×1,5<span>м</span></h2>
                <h3>Передвижная сборно-разборная вышка предназначена для производства монтажных, ремонтных и отделочных работ, как снаружи, так и внутри строений и размещения рабочих и материалов непосредственно в зоне работ</h3>
                <p>Технические характеристики</p>
                <ol>
                    <li>Максимальная высота вышки: 21,0 м</li>
                    <li>Подъем высоты кратен 1 м</li>
                    <li>Максимальная высота рабочей площадки: 19,9 м</li>
                    <li>Размеры рабочей площадки: 0,6 х 1,5 м</li>
                    <li>Размеры основания вышки-туры: 0,7 х 2 м</li>
                    <li>Нормативная поверхностная нагрузка на рабочий настил: 200 кгс</li>
                </ol>
                <div class="tt-cc__link">
                    <a alt="сдаем в аренду вышки-туры, можно ознакомтся с техническим паспортом" href="{{ asset('frontend/doc/balaton-0,6x1,5.pdf') }}" target="_blank">Технический паспорт →</a>
                </div>
            </div>
        </div>
        <div class="tt-card__with__bg">
            <div class="towers-tour__card my-container">
                <div class="tt-card__content tt-card__revers">
                    <h2>Балатон 1×2<span>м</span></h2>
                    <h3>Вышки-туры «Балатон 12» более универсальные. Их можно применять на высоте до 21 метра используя стабилизаторы (входящие в комплект) и при необходимости крепления к стене. При высоте до 13,1 метра вышка-тура является самостоящей и не требует крепления к стене</h3>
                    <p>Технические характеристики</p>
                    <ol>
                        <li>Максимальная высота вышки: 21,0 м</li>
                        <li>Подъем высоты кратен 1 м</li>
                        <li>Максимальная высота рабочей площадки: 19,9 м</li>
                        <li>Размеры рабочей площадки: 1,03 х 2 м</li>
                        <li>Размеры основания вышки-туры: 1,5 х 2 м</li>
                        <li>Нормативная поверхностная нагрузка на рабочий настил при высоте до 13,1 м: 400 кгс</li>
                        <li>Нагрузка на рабочий настил при высоте свыше 13,1 м: 200 кгс</li>
                    </ol>
                    <div class="tt-cc__link">
                        <a alt="технический паспорт для вышек-тур" href="{{ asset('frontend/doc/balaton-1x2.pdf') }}" target="_blank">Технический паспорт →</a>
                    </div>
                </div>

                <div class="tt-card__image">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/balton-2.webp') }}">
                        <img src="{{ asset('frontend/img/tour-towers/balton-2.jpg') }}" width="670" height="350" title="вышки-туры на объекте" alt="аренда вышки-туры Татарстан">
                    </picture>
                </div>

            </div>
        </div>
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/balton-3.webp') }}">
                    <img src="{{ asset('frontend/img/tour-towers/balton-3.jpg') }}" title="вышки-туры сдаем в аренду с доставкой" width="670" height="350" alt="вышки-туры в аренду недорого">
                </picture>
            </div>
            <div class="tt-card__content">
                <h2>Балатон 2×2<span>м</span></h2>
                <h3>Вышки-туры «Балатон 20» самые мощные из серии. Их высота может достигать 21,3 метра и главное отличие от остальных вышек - это грузоподъемность на всех высотах 400 кг. Размер рабочей площадки 2х2 метра – это позволяет чувствовать себя более комфортно на любой высоте</h3>
                <p>Технические характеристики</p>
                <ol>
                    <li>Максимальная высота вышки: 21,3 м</li>
                    <li>Подъем высоты кратен 1,4 м</li>
                    <li>Максимальная высота рабочей площадки: 20,3 м</li>
                    <li>Размеры рабочей площадки: 1,95 х 2 м</li>
                    <li>Размеры основания вышки-туры: 2 x 2,4 м</li>
                    <li>Нормативная поверхностная нагрузка на рабочий настил: 400 кгс</li>
                </ol>
                <div class="tt-cc__link">
                    <a alt="заказывайте наши вышки-тур! Имеются технический паспорта" href="{{ asset('frontend/doc/balaton-2x2.pdf') }}" target="_blank">Технический паспорт →</a>
                </div>
            </div>
        </div>
    </section>
    <section id="price-towers__tour">
        <div class="price-towers__tour my-container">
        {{-- <div class="sp-bg">
            <h2 class="sp-title">Стоимость аренды вышек-тур</h2>
            <h2 class="sp-title_min"> Цены могут меняться в зависимости от сезона и объема взятого в аренду оборудования</h2>
        </div>
            <p class="ptt-description">Минимальная сумма заказа в размере арендной платы за 7 дней</p> --}}
            {{-- <div class="ptt-image">
                @foreach ($pricetours -> reverse() as $post)
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/scaffolding-price.webp') }}">
                    <img src="{{ asset('prices/' . $post->path) }}" title="цены вышки-туры" width="720" height="1280" alt="аренда вышки-туры прайс казань" title="прайс Аренда Высоты">
                </picture>
                @endforeach
            </div> --}}
            <div class="ptt-call-to-action">
                <h2>Арендуйте вышку-туры без переплат</h2>
                <button class="ptt-card__btn ptt-card__btn__one btn" data-btn="Заявка на аренду вышек-туров">Арендовать</button>
                {{-- <a target="_blank" href="https://calcarenda.vercel.app/"><button id='bot' class="btn_calc" >Рассчитать</button></a> --}}
            </div>
        </div>
    </section>
    <!-- include our-products start -->
    <section id="towers-tour__recommendations">
        <div class="our-services__title my-container">
            <h2>Возможно вас заинтересует</h2>
        </div>
        <div class="tt-recommendations my-container">
            <div class="op-main">
                <div class="op-main__card">
                    <a href="{{ route('gallery_tower') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-1.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-1.jpg') }}" width="670" height="350" alt="вышки-туры с доставкой по казани" title="доставка строительного оборудования">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея наших вышек-тур</h2>
                    <a href="{{ route('gallery_tower') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-2.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-2.jpg') }}" width="670" height="350" title="выское качество наших строительных лесов" alt="заказывайте наши строительные леса">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Рамные строительные леса</h2>
                    <a href="{{ route('scaffolding') }}" class="op-card__link">Подробнее →</a>
                </div>
            </div>
            @include('site.inc.products_additional')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
