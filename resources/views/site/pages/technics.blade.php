@extends('site.layouts.main')


@section('title', 'Грузоперевозки')
@section('description', 'Грузоперевозки по Казани, перевоз строительного оборудования и т.д ')
@section('keywords', 'грузоперевозки казань, перевозка грузов, заказать перевозку груза, услуги по перевозке грузов, транспортные перевозки')

@section('header_title')
    <div class="header-content-technics my-container">
        <h1>Грузоперевозки в <span>Казани</span> и <span>РТ</span> до 6 тонн с минимальным или нулевым залогом</h1>
        <p>Перевозим грузы до 6 тонн на грузовике ISUZU, до 2-3 тонн на Газелях</p>
        <p>Принимаем любые формы оплаты (без НДС, с НДС)</p>
        <div class="modal_technics">
            <form action="{{ route('send')}}" method="post" autocomplete="on">
                @csrf
                <h4 class="modal-title">Получите прайс на грузоперевозки за 1 минуту </h4>
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
                <input type="submit" name="submit" value="Получить прайс" class="modal-btn">
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
                    <source type="image/webp" srcset="{{ asset('frontend/img/technics/gaz7.webp') }}">
                    <img src="{{ asset('frontend/img/technics/gaz7.jpg') }}" width="670" height="750" alt="грузоперевозки по казани">
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
                    <img src="{{ asset('frontend/img/technics/texnica1.jpg') }}" width="670" height="450" alt="грузоперевозки по татарстану">
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
                        <img src="{{ asset('frontend/img/technics/gaz4.jpg') }}" width="670" height="450" alt="грузоперевозки недорого">
                    </picture>
                </div>

            </div>
        </div>
        <div class="towers-tour__card my-container">
            <div class="tt-card__image">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica2.webp') }}">
                    <img src="{{ asset('frontend/img/technics/texnica2.jpg') }}" width="670" height="450" alt="грузоперевозки по россии">
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
                            <img src="{{ asset('frontend/img/technics/texnica1.jpg') }}" width="670" height="350" alt="грузоперевозки">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея грузоперевозки</h2>
                    <a href="{{ route('gallery_technics') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-2.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-2.jpg') }}" width="670" height="350" alt="аренда вышки-туры казань">
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
