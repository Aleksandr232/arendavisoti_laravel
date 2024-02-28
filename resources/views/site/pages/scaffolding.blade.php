@extends('site.layouts.main')

@section('title', 'Аренда лесов Казань')
@section('description', 'Предлагаем в аренду строительные леса с доставкой по Казани по самым выгодным ценам «Аренда высоты»')
@section('keywords', 'строительные леса, аренда лесов, аренда лесов казань, строительные леса напрокат, прокат лесов')

@section('header_title')
<div class="header-content-home my-container">
    <br/>
<h1>Аренда строительных лесов в Казани с доставкой от 2-х часов </h1>
<p>с минимальным или нулевым залогом<br/>
☑️ Строительные леса, предназначенные для работ на высоте до 40 метров<br/>
☑️ Используются при внутренней или внешней отделке зданий от малых до крупных объектов
<br/>
☑️ В наличии более 2000 м2 строительных лесов<br/>
☑️ Принимаем любые формы оплаты (без НДС, с НДС)
<br/>
<br/>
<br/><br/>
</p>
<div class="modal_home">
    <form action="{{ route('send')}}" method="post" autocomplete="on">
        @csrf
        <h4 class="modal-title">Получите каталог и прайс на аренду лесов за 1 минуту </h4>
        <label>
            <input type="hidden" name="hidden" value="Заявка на услуги с главной страницы">
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
        <div id="price" class="scaffolding-price my-container">
            {{-- <div class="sp-bg">
            <h2 class="sp-title">Стоимость аренды лесов</h2>
            <h2 class="sp-title_min"> Цены могут меняться в зависимости от сезона и объема взятого в аренду оборудования</h2>
            </div> --}}
            {{-- <div class="download-price">
                @if(isset($pricefile))
                    @foreach($pricefile->reverse() as $post)
                        @if($loop->first)
                        <a alt='сдаем в аренду строительные леса с прайсом можно ознакомится на сайте' title="прайс строительных лесов" href="{{ asset('prices/' . $post->filepath ) }}" download="{{ $post->filename }}" target="_blank">Скачать прайс →</a>
                        @endif
                    @endforeach
                @endif
            </div> --}}
            {{-- <div id='targetBlock' class="sp-image">
                @foreach ($pricescaff -> reverse() as $post)
                <picture>
                     <source type="image/webp" srcset="{{ asset('frontend/img/stroitelnye-lesa/scaffolding-price.webp') }}"> 
                    <img src="{{ asset('prices/' . $post->path) }}" title="цены аренда лесов" width="720" height="1280" alt=" прайс строительных лесов" title="прайс">
                </picture>
                @endforeach
            </div> --}}
            <div class="sp-call-to-action">
                <h2>Арендуйте строительные леса без переплат</h2>
                <button class="ptt-card__btn ptt-card__btn__one sp-cta__btn btn" data-btn="Заявка на аренду строительных лесов">Заказать звонок</button>
                <button onclick="openModal()" class="btn_calc" >Рассчитать</button></a>
                <a href="tel:+79867120059"><button class="btn_calc">Позвонить</button></a>
                <a href="https://wa.me/+79867120059"><button class="btn_calc">Написать</button></a>
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
