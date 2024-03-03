@extends('site.layouts.gallery')

@section('title', 'Галерея «Аренда высоты»')
@section('description', 'Предлагаем в аренду минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, услуги по очистке снега с крыш «Аренда высоты»')
@section('keywords', 'очистка крыш +от снега, уборка снега +с крыш, минитрактор аренда, минитрактор авито, минитрактора +в татарстане, минитрактор казань, строительный альпинизм')

@section('header_title')
    <div class="header-content my-container">
        <h1>Строительное оборудование <span>в Казани</span></h1>
        <p>Предлагаем в аренду строительные вышки-туры, рамные строительные леса, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
    </div>
@endsection

@section('content')
    <section id="gallery">
        <div class="gallery">
        <div class="gallery-card">
                <div class="gallery-card__image">
                     <a href="{{ route('gallery_scaffolding') }}"  class="gallery-show" title="Строительные леса">
                            <img src="../../../../public/frontend/img/gallery/kazanskiy-kreml.webp" width="320" height="350" alt="аренда лесов и тур">
                    </a>

                </div>
                <a href="{{ route('gallery_scaffolding') }}"><h3>Галерея строительных лесов</h3></a>
        </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                     <a href="{{ route('gallery_tower') }}"  class="gallery-show" title="Вышки-туры">
                            <img src="../../../../public/frontend/img/gallery/kazan-moll.jpg" width="320" height="350" alt="аренда вышек-тур">
                    </a>

                </div>
                <a href="{{ route('gallery_tower') }}"><h3>Галерея вышек-тур</h3></a>
        </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                     <a href="{{ route('gallery_technics') }}"  class="gallery-show" title="Грузоперевозки">
                            <img src="../../../../public/frontend/img/technics/news7.jpg" width="320" height="350" alt="грузоперовозки">
                    </a>

                </div>
                <a href="{{ route('gallery_technics') }}"><h3>Галерея грузоперевозки</h3></a>
        </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                     <a href="{{ route('gallery_technics_bars') }}"  class="gallery-show" title="Минитрактор">
                            <img src="../../../../public/frontend/img/technics/bars9.jpg" width="320" height="350" alt="аренда минитрактор">
                    </a>

                </div>
                <a href="{{ route('gallery_technics_bars') }}"><h3>Галерея минитрактор</h3></a>
        </div>

        <div class="gallery-card">
                <div class="gallery-card__image">
                     <a href="{{ route('gallery_snow_removal') }}"  class="gallery-show" title="Уборка снега с крыш">
                            <img src="../../../../public/frontend/img/snow-removal/alip2.jpg" width="320" height="350" alt="уборка снега с крыш">
                    </a>

                </div>
                <a href="{{ route('gallery_snow_removal') }}"><h3>Галерея уборка снега</h3></a>
        </div>

        <div class="gallery-card">
            <div class="gallery-card__image">
                 <a href="{{ route('gallery_warehouse') }}"  class="gallery-show" title="Аренда высоты">
                        <img src="../../../../public/frontend/img/about-us.webp" width="320" height="350" alt="Аренда высоты">
                </a>

            </div>
            <a href="{{ route('gallery_warehouse') }}"><h3>Галерея наших складов</h3></a>
    </div>


        </div>
    </section>
    <!-- include our-products start -->
    <section id="gallery-recommendations">
        <div class="our-services__title my-container">
            <h2>Арендуйте у нас</h2>
        </div>
        <div class="gallery-recommendations my-container">
            @include('site.inc.main_products')
            @include('site.inc.products_additional')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
