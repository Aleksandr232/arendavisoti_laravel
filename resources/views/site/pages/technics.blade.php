@extends('site.layouts.main_technics')


@section('title', 'Грузоперевозки  «Аренда высоты»')
@section('description', 'Грузоперевозки по Казани, перевоз строительного оборудования и т.д ')
@section('keywords', 'грузоперевозки казань, доставка, доставка лесов, техника')

@section('header_title')
    <div class="header-content my-container">
        <h1>Грузоперевозки <span>в Казани</span></h1>
        <p>Предлагаем грузоперевозку по Казани, РТ и соседним регионам</p>
    </div>
@endsection

@section('content')
    <section id="towers-tour">
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/technics/gaz7.webp') }}">
                    <img src="{{ asset('frontend/img/technics/gaz7.jpg') }}" width="670" height="750" alt="грузоперевозки казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <h3>Перевозим грузы до 6 тонн на грузовике ISUZU, до 2-3 тонн на Газелях, по Казани, РТ и соседним регионам. Принимаем любые формы оплаты (без НДС, с НДС).</h3>
                <ol style="position:relative; top: 10px">
                        <li>Погрузка и разгрузка <div class="divider"><div class="rub">от 500 ₽/ч</div></div></li>
                        <li>Экспедиторские услуги<div class="divider1"><div class="rub1">от 500 ₽</div></div></li>
                        <li>Фотоотчёт о погрузке и разгрузке<div class="divider2" ><div class="rub2">500 ₽</div></div></li>
                        <li>Ответственное хранение<div class="divider3"><div class="rub3">от 500 ₽/д</div></div></li>
                        <li>GPS-отчёт<div class="divider4" ><div class="rub4">500 ₽</div></div></li>
                        <li>Использование гидравлической тележки<div class="divider5" ><div class="rub5">1 000 ₽</div></div></li>
                        <li>Сборные перевозки<div class="divider6" ><div class="rub6">от 1 000 ₽</div></div></li>
                        <li>Подача ко времени<div class="divider7" ><div class="rub7">500 ₽</div></div></li>
                        <li>Срочная подача<div class="divider8" ><div class="rub8">от 500 ₽</div></div></li>
                    </ol>


                    <div style="position:relative; top:15px" id='map'></div>
            </div>
        </div>
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture style="position:relative; top: 10px">
                    <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica1.webp') }}">
                    <img src="{{ asset('frontend/img/technics/texnica1.jpg') }}" width="670" height="450" alt="грузоперевозки казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <h3>Пятитонник ISUZU фургон длинной 6,20м</h3>
                <ol style="position:relative; top: 10px">
                    <li>грузоподъемность до 6 тонн - 1200 ₽/час</li>
                    <li>Металлический фургон (не изотермический) высотой 2,30м</li>
                    <li>Погрузка задняя</li>
                    <li>Безналичный оплата без НДС +10%, с НДС +20%</li>
                    <li>Минимальная оплата за 3 часа</li>
                    <li>Стоимость по межгороду, в зависимости от километража и груза по договорённости</li>
                </ol>
            </div>
        </div>
        <div class="tt-card__with__bg">
            <div class="towers-tour__card my-container">
                <div class="tt-card__content tt-card__revers">

                    <h3>Газель, фургон длинной 5м</h3>

                    <ol style="position:relative; top: 10px">
                        <li>Грузоподъемность до 3 тонн - 800 ₽/час</li>
                        <li>Тентованный фургон высотой 2,30м</li>
                        <li>Погрузка задняя</li>
                        <li>Безналичный оплата без НДС +10%, с НДС +20%</li>
                        <li>Минимальная оплата за 2 часа</li>
                        <li>Стоимость по межгороду, в зависимости от километража и груза по договорённости</li>
                    </ol>
                </div>

                <div class="tt-card__image">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('frontend/img/technics/gaz4.webp') }}">
                        <img src="{{ asset('frontend/img/technics/gaz4.jpg') }}" width="670" height="450" alt="грузоперевозки казань">
                    </picture>
                </div>

            </div>
        </div>
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica2.webp') }}">
                    <img src="{{ asset('frontend/img/technics/texnica2.jpg') }}" width="670" height="450" alt="грузоперевозки казань">
                </picture>
            </div>
            <div class="tt-card__content">
                <h3>Газель фургон длинной 4,30м</h3>
                <ol style="position:relative; top: 10px">
                    <li>Грузоподъемность до 2 тонн - 700 ₽/час</li>
                        <li>Тентованный фургон высотой 2,30м</li>
                        <li>Погрузка задняя</li>
                        <li>Безналичный оплата без НДС +10%, с НДС +20%</li>
                        <li>Минимальная оплата за 2 часа</li>
                        <li>Стоимость по межгороду, в зависимости от километража и груза по договорённости</li>
                </ol>
            </div>
        </div>
    </section>
    <section id="price-towers__tour">
        <div class="price-towers__tour my-container">
            <div class="ptt-call-to-action">
                <h2>Арендуйте технику</h2>
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
                    <a href="{{ route('gallery_technics') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica1.webp') }}">
                            <img src="{{ asset('frontend/img/technics/texnica1.jpg') }}" width="670" height="350" alt="грузоперевозки казань">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея грузоперевозки</h2>
                    <a href="{{ route('gallery_technics') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-2.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-2.jpg') }}" width="670" height="350" alt="вышки-туры казань">
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
