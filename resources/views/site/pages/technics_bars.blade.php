@extends('site.layouts.main')


@section('title', 'Услуги минитрактора «Аренда высоты»')
@section('description', 'Услуги минитрактора в Казани по доступным ценам. С доставкой')
@section('keywords', 'аренда минитрактора, барсик, уборка снега')

@section('header_title')
    <div class="header-content my-container">
        <h1>Услги минипогрузчика<span> в Казани</span></h1>
        <p>Предлагаем услуги минитрактора. Уборка снега и т.д. Своя доставка! </p>
    </div>
@endsection

@section('content')
    <section id="towers-tour">
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{asset('frontend/img/technics/texnica3.webp') }}">
                    <img src="{{ asset('frontend/img/technics/texnica3.jpg') }}" width="470" height="470" alt="аренда минитрактора казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <ol>
                    <li>Своя Доставка по Казани и окрестностям, стоимость в зависимости от адреса доставки 3000-4000₽ по городу</li>
                    <li>📌Базируемся в п. Салмачи. Поэтому в в пределах ул. Овражная и ул. Мира платить за доставку не надо, только за часы работы</li>
                    <li>Принимаем любые формы оплаты:
                        <li>-1400 ₽/час наличкой</li>
                        <li>-1500₽/час без НДС</li>
                        <li>-1600₽/час с НДС</li>
                        <li>-Минимум 4 часа</li>
                    </li>
                    <li>✅ уберем, погрузим снег</li>
                    <li>✅ выpaвняем учаcткок</li>
                    <li>✅ пoгpузим сыпучие мaтериалы</li>
                    <li>✅ уберём мусop</li>
                    <li>✅ и т.д</li>
                </ol>
                <video style="position: relative; top: 27px;" width="400" height="300" controls="controls" >
                <source src="../../../../public/frontend/video/barsik6.mp4">
            </video>
            </div>
        </div>


    </section>
    <section id="price-towers__tour">
        <div class="price-towers__tour my-container">
            <div class="ptt-call-to-action">
                <h2>Заказать минитрактор</h2>
                <button class="srb-btn btn" data-btn="Заявка на выезд оценщика на уборку снега с крыш">Заказать</button>
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
                    <a href="{{ route('gallery_technics_bars') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica3.webp') }}">
                            <img src="{{ asset('frontend/img/technics/texnica3.jpg') }}" width="670" height="350" alt="аренда минитрактора казань">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея минитрактора</h2>
                    <a href="{{ route('gallery_technics_bars') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-2.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-2.jpg') }}" width="670" height="350" alt="аренда вышки туры">
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
