@extends('site.layouts.main')

@section('title', 'Контакты «Аренда высоты»')
@section('description', 'строительные леса, вышки-туры, леса, мнитрактор, грузоперевозки, уборка снега с крыш»')
@section('keywords', 'вышка тура строительная передвижная, вышка тура 1 1, вышка тура 12, леса вышка тура, вышка тура балатон, аренда строительных лесов +в казани цена, леса строительные рамные, прокат лесов строительных')

@section('header_title')
    <div class="header-content my-container">
        <h1>Аренда оборудования для работ <span>на высоте</span></h1>
        <p>Предлагаем в аренду строительные вышки-туры, рамные строительные леса, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
    </div>
@endsection

@section('content')
    <section id="contacts">
        <div class="contacts my-container">
            <div class="contacts-image">
            <div style="position:relative; overflow:hidden;"><a href="https://yandex.ru/maps/org/arenda_vysoty/186521182233/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Аренда Высоты</a><a href="https://yandex.ru/maps/43/kazan/category/scaffolding/184107569/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Строительные леса в Казани</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUvq2t33C" width="670" height="350" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
            <div class="contacts-card">
                <div class="cc-content">
                    <h3>Наши контакты</h3>
                    <div class="cc-content__address">
                        <h4>Адрес:</h4>
                        <address>
                            <img src="{{ asset('frontend/img/icons/location.svg') }}" width="18" height="18" alt="леса в аренду">
                            Россия, Республика Татарстан, г. Казань, ул. Мирхайдара Файзи, 68
                        </address>
                    </div>
                    <div class="cc-content__phone">
                        <h4>Телефон:</h4>
                        <div class="cc-content__phone__container">
                            <img src="{{ asset('frontend/img/icons/telephone.svg') }}" width="18" height="18" alt="леса в аренду">
                            <a href="tel:+79867120059">8 986 712-00-59</a>
                        </div>
                    </div>
                    <div class="cc-content__messengers">
                        <h4>Мессенджеры:</h4>
                        <div class="cc-content__social__networks">
                            <a href="https://wa.me/+79600625525" title="Напишите нам в Whatsapp" target="_blank">
                                <img src="{{ asset('frontend/img/icons/whatsapp.svg') }}" width="24" height="24" alt="леса в аренду">
                            </a>
                            <a href="#" title="Мы в Инстаграм" target="_blank">
                                <img src="{{ asset('frontend/img/icons/instagram.svg') }}" width="24" height="24" alt="леса в аренду">
                            </a>
                            <a href="https://vk.com/arenda_visoti" title="Мы ВКонтакте" target="_blank">
                                <img src="{{ asset('frontend/img/icons/vk.svg') }}" width="24" height="24" alt="леса в аренду">
                            </a>
                            <a href="https://t.me/HireHeightsbot" title="Напиши боту" target="_blank">
                                <img src="{{ asset('frontend/img/icons/telegram.svg') }}" width="24" height="24" alt="леса в аренду">
                            </a>
                        </div>
                    </div>
                    <div class="cc-content__legal__address">
                        <p>ООО "АРЕНДА ВЫСОТЫ"</p>
                        <p>ОГРН  1211600085927</p>
                        <p>ИНН 1684000706</p>
                        <div class="sc-link">
                            <a href="{{ asset('frontend/doc/Карта партнера ООО Аренда Высоты.pdf') }}" target="_blank">СКАЧАТЬ КАРТУ ПАРТНЕРА →</a>
                        </div>
                    </div>
                </div>
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
