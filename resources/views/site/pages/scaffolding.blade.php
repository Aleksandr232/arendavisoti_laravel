@extends('site.layouts.main')

@section('title', 'Аренда лесов Казань')
@section('description', 'Предлагаем в аренду строительные леса с доставкой по Казани по самым выгодным ценам «Аренда высоты»')
@section('keywords', 'леса строительные, аренда строительных лесов, строительные леса +в казани, строительные леса +в аренду казань, леса строительные авито, аренда строительных лесов цена, аренда лесов, аренда строительных лесов, аренда строительных лесов цена, аренда лесов казань, строительные леса +в аренду казань')

@section('header_title')
    <div class="header-content my-container">
        <h1>Аренда строительных  лесов {{-- <span>в Казани</span> --}}</h1>
        <p>Предлагаем в аренду строительные леса, предназначенные для работ на высоте до 40 метров.  Это прочные и универсальные конструкции, которые используются при внутренней или внешней отделке зданий от малых до крупных объектов</p>
    </div>
@endsection

@section('content')
    <section id="scaffolding">
        <div class="scaffolding my-container">
            <div class="scaffolding-image">
                <picture>
                    <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-1.webp') }}">
                    <img src="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-1.jpg') }}" width="670" height="350" title="сдаем строительные леса по Казани и Татарстану" alt="аренда строительных лесов казань">
                </picture>
            </div>
            <div class="scaffolding-content">
                <h2>Леса строительные <span></span></h2>
                <h3>Предназначены для отделки стен и потолков внутри зданий, а также для отделочных и ремонтных работ на фасадах зданий. Имеют простую конструкцию на флажковых замках и при сборке не требуют специальных инструментов. Считаются легкими и надежными так как используется труба диаметром 42мм, а двойное ограждение гарантирует безопасность при строительных работах</h3>
                <p>Технические характеристики</p>
                <ol>
                    <li>Максимальная высота лесов: 40 м</li>
                    <li>Шаг яруса по высоте: 2 м</li>
                    <li>Шаг стоек вдоль стены: 3 м</li>
                    <li>Ширина яруса (прохода) между стойками: 0,95 м</li>
                    <li>Нормативная нагрузка: 200 кг/м2</li>
                </ol>
                <div class="sc-link">
                    <a href="{{ asset('frontend/doc/lspr-200.pdf') }}" target="_blank">Технический паспорт →</a>
                </div>
            </div>
        </div>
    </section>
    <section id="scaffolding-price">
        <div class="scaffolding-price my-container">
            <div class="sp-bg">
            <h2 class="sp-title">Стоимость аренды лесов</h2>
            <h2 class="sp-title_min"> Цены могут меняться в зависимости от сезона и объема взятого в аренду оборудования</h2>
            </div>
            <div class="download-price">
                @if(isset($pricefile))
                    @foreach($pricefile->reverse() as $post)
                        @if($loop->first)
                        <a alt='сдаем в аренду строительные леса с прайсом можно ознакомится на сайте' title="прайс строительных лесов" href="{{ asset('prices/' . $post->filepath ) }}" download="{{ $post->filename }}" target="_blank">Скачать прайс →</a>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="sp-image">
                @foreach ($pricescaff -> reverse() as $post)
                <picture>
                    {{-- <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/scaffolding-price.webp') }}"> --}}
                    <img src="{{ asset('prices/' . $post->path) }}" title="цены аренда лесов" width="720" height="1280" alt=" прайс строительных лесов" title="прайс">
                </picture>
                @endforeach
            </div>
            <div class="sp-call-to-action">
                <h2>Арендуйте строительные леса без переплат</h2>
                <button class="ptt-card__btn ptt-card__btn__one sp-cta__btn btn" data-btn="Заявка на аренду строительных лесов">Арендовать</button>
                <button onclick="openModal()" class="btn_calc" >Рассчитать</button></a>
                <div id="modals">
                    <div class="modal__content">
                      <span onclick="closesModal()" id="close">&times;</span>
                      <form>
                          <label for="length">Длина:</label>
                          <input class='input-name__field' placeholder="кратно 3" type="number" min="3" step="3" id="length" required oninput="checkLength()">

                          <label for="height">Высота:</label>
                          <input class='input-name__field' placeholder="кратно 2" type="number" min="2" step="2" id="height" required oninput="checkHeight()">

                          <button class="btn_calc" id="calculate-btn">Рассчитать площадь</button>
                      </form>
                    </div>
                  </div>
            </div>
    </section>
    <!-- include our-products start -->
    <section id="scaffolding__recommendations">
        <div class="our-services__title my-container">
            <h2>Возможно вас заинтересует</h2>
        </div>
        <div class="scaffolding__recommendations my-container">
            <div class="op-main">
                <div class="op-main__card">
                    <a href="{{ route('gallery_scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-2.webp') }}">
                            <img src="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-2.jpg') }}" width="670" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея наших лесов</h2>
                    <a href="{{ route('gallery_scaffolding') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('towers_tour') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-3.webp') }}">
                            <img src="{{ asset('frontend/img/stroitelnye-lesa/stroitelnye-lesa-3.jpg') }}" width="670" height="350" alt="аренда тур">
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
