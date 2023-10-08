@extends('site.layouts.main_snow')

@section('title', 'Уборка снега с крыш, и уборка барсиком ')
@section('description', 'уборка снега с крыш, уборка снега Казань')
@section('keywords', 'уборка снега с крыш Казань, уборка снега с крыш цена, сброс снега с крыш, чистка снега с крыш, чистка кровли от снега, уборка снега с кровли, очистка кровли от снега, уборка сосулек и наледи с крыш')

@section('header_title')
    <div class="header-content my-container">
        <h1>Уборка снега с крыш <span>в Казани и пригороде</span></h1>
        <p>Предлагаем уборку снега и удаление сосулек и наледи с крыш, профессиональными промышленными альпинистами, с гарантией сохранности вашей кровли и водостоков. У нас вы можете заказать разовую услугу или заключить договор на абонентское обслуживание на определенный период времени</p>
    </div>
@endsection

@section('content')
    <div id="snow-removal">
        <div class="sr-banner my-container">
            <div class="srb-content">
                <h2>Уберем снег с крыш в Казани и пригороде</h2>
                <p>Бесплатный выезд оценщика</p>
                <button class="srb-btn btn" data-btn="Заявка на выезд оценщика на уборку снега с крыш">Вызвать оценщика</button>
            </div>
        </div>
        <div class="sr-advantages my-container">
            <div class="sra-card">
                <div class="sra-card__icon">
                    <img src="{{ asset('frontend/img/snow-removal/sr-1.svg') }}" width="50" height="50" alt="уборка снега с крыш Казань">
                </div>
                <h2>От заявки до старта работы - не более 24 часов</h2>
            </div>
            <div class="sra-card">
                <div class="sra-card__icon">
                    <img src="{{ asset('frontend/img/snow-removal/sr-2.svg') }}" width="50" height="50" alt="уборка снега с крыш Казань">
                </div>
                <h2>Несем материальную ответственность за сохранность кровли</h2>
            </div>
            <div class="sra-card">
                <div class="sra-card__icon">
                    <img src="{{ asset('frontend/img/snow-removal/sr-3.svg') }}" width="50" height="50" alt="уборка снега с крыш Казань">
                </div>
                <h2>Работаем без праздников и выходных</h2>
            </div>
        </div>
        <div class="sr-price__container">
            <div class="sr-price__title">
                <h2>Услуги по уборке снега</h2>
                <p>Минимальный тариф: 3000 &#8381;</p>
            </div>
            <div class="sr-price my-container">
                <div class="sr-price__card">
                    <div class="srp-card__bg srp-cb__color__one"></div>
                    <div class="srp-card__content">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/snow-removal/sr-price-1.webp') }}">
                            <img src="{{ asset('frontend/img/snow-removal/sr-price-1.jpg') }}" width="280" height="280" alt="уборка снега с крыш Казань">
                        </picture>
                        <h2>Уборка снега с плоской крыши</h2>
                        <p>от <span>40</span>&#8381; до <span>100</span>&#8381; / м<sup style="font-size: 70%;vertical-align: super;">2</sup></p>
                        <button class="srp-card__btn srp-card__btn__color__one btn" data-btn="Заявка на уборку снега с плоской крыши">Заказать</button>
                    </div>
                </div>
                <div class="sr-price__card">
                    <div class="srp-card__bg srp-cb__color__two"></div>
                    <div class="srp-card__content">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/snow-removal/sr-price-2.webp') }}">
                            <img src="{{ asset('frontend/img/snow-removal/sr-price-2.jpg') }}" width="280" height="280" alt="уборка снега с крыш Казань">
                        </picture>
                        <h2>Уборка снега со скатной крыши</h2>
                        <p>от <span>50</span>&#8381; до <span>130</span>&#8381; / м<sup style="font-size: 70%;vertical-align: super;">2</sup></p>
                        <button class="srp-card__btn srp-card__btn__color__two btn" data-btn="Заявка на уборку снега со скатной крыши">Заказать</button>
                    </div>
                </div>
                <div class="sr-price__card">
                    <div class="srp-card__bg srp-cb__color__three"></div>
                    <div class="srp-card__content">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/snow-removal/sr-price-3.webp') }}">
                            <img src="{{ asset('frontend/img/snow-removal/sr-price-3.jpg') }}" width="280" height="280" alt="уборка снега с крыш Казань">
                        </picture>
                        <h2>Удаление сосулек <nobr>с крыш</nobr></h2>
                        <p>от <span>70</span>&#8381; до <span>130</span>&#8381; / м<sup style="font-size: 70%;vertical-align: super;">2</sup></p>
                        <button class="srp-card__btn srp-card__btn__color__three btn" data-btn="Заявка на удаление сосулек с крыши">Заказать</button>
                    </div>
                </div>
                <div class="sr-price__card">
                    <div class="srp-card__bg srp-cb__color__four"></div>
                    <div class="srp-card__content">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/snow-removal/sr-price-4.webp') }}">
                            <img src="{{ asset('frontend/img/snow-removal/sr-price-4.jpg') }}" width="280" height="280" alt="уборка снега с крыш Казань">
                        </picture>
                        <div class="srp-insert__info">
                            <h3>Минимум 4 часа + доставка трактора</h3>
                        </div>
                        <div class="srp-insert__info1">
                            <h3>Доставка и увоз <span>3000-4000</span>&#8381; по городу в зависимости от места</h3>
                        </div>
                        <h2>Уборка снега минитрактором</h2>
                        <p style=font-size:14px><span>1400</span>&#8381; / в час нал</p>
                        <p style=font-size:14px><span>1500</span>&#8381; / в час безнал без НДС</p>
                        <p style=font-size:14px><span>1600</span>&#8381; / в час безнал  с НДС</p>
                        <p style="font-size:14px; background: -webkit-gradient(linear, left top, right top, from(rgba(255, 221, 85, 0.8)), to(rgba(255, 221, 85, 0.9)))">Принимаем все формы оплаты</p>
                        <button class="srp-card__btn srp-card__btn__color__four btn" data-btn="Заявка на уборку и вывоз снега техникой">Заказать</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="sr-callToAction">
            <div class="srcTA-title">
                <h2>Окончательная цена рассчитывается индивидуально и зависит от:</h2>
            </div>
            <div class="srcTA-container my-container">
                <div class="srcTA-content">
                    <ul>
                        <li>объема обшей площади очищаемой кровли</li>
                        <li>количества снега</li>
                        <li>количества льда</li>
                        <li>сложности крыши (уклона)</li>
                        <li>наличия/отсутствия заборов/снегозадержателей, выхода на крышу, страховочных тросов</li>
                    </ul>
                    <h2>Вы можете заказать разовую уборку снега или заключить договор на абонентское обслуживание на определенный период времени</h2>
                </div>
                <div class="srcTA-form">
                    <h2>Закажите <span>бесплатный</span> выезд оценщика</h2>
                    <form action="{{ route('send') }}" method="post" autocomplete="on">
                        @csrf
                        <label>
                            <input type="hidden" name="hidden" value="Заявка на вызов оценщика на уборку снега с крыш">
                        </label>
                        <label>
                            <input type="text" name="name" class="srcTAf-input__name" placeholder="Введите свое имя" required>
                        </label>
                        <label>
                            <input type="tel" name="phone" class="srcTAf-input__phone mask-phone" placeholder="Введите номер телефона" required>
                        </label>
                        <div class="srcTAf-confirm">
                            <p>Нажимая на кнопку «Вызвать оценщика», вы даёте согласие на <a href="{{ asset('frontend/doc/privacy.pdf') }}" rel="nofollow" target="_blank" class="modal-doc">обработку своих персональных данных</a></p>
                        </div>
                        <input type="submit" name="submit" value="Вызвать оценщика" class="srcTAf-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- include our-products start -->
    <section id="towers-tour__recommendations">
        <div class="our-services__title my-container">
            <h2>Возможно вас заинтересует</h2>
        </div>
        <div class="tt-recommendations my-container">
            <div class="op-main">
                <div class="op-main__card">
                    <a href="{{ route('gallery_snow_removal') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/snow-removal/hige1.webp') }}">
                            <img src="{{ asset('frontend/img/snow-removal/hige1.jpg') }}" width="670" height="350" alt="уборка снега с крыш Казань">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея уборка снега</h2>
                    <a href="{{ route('gallery_snow_removal') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('towers_tour') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/main/tower.webp') }}">
                            <img src="{{ asset('frontend/img/main/tower.jpg') }}" width="670" height="350" alt="аренда вышки-туры">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Вышки-туры строительные</h2>
                    <a href="{{ route('towers_tour') }}" class="op-card__link">Подробнее →</a>
                </div>
            </div>
            @include('site.inc.products_extended')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
