@extends('site.layouts.gallery_scaffolding')

@section('title', 'Аренда лесов «Аренда высоты»')
@section('description', 'Предлагаем в аренду минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, услуги по очистке снега с крыш «Аренда высоты»')
@section('keywords', 'очистка крыш +от снега, уборка снега +с крыш, минитрактор аренда, минитрактор авито, минитрактора +в татарстане, минитрактор казань, строительный альпинизм, аренда лесов, аренда строительных лесов, аренда строительных лесов цена, аренда лесов казань, строительные леса +в аренду казань')

@section('header_title')
    <div class="header-content my-container">
        <h1>Аренда строительных  лесов {{-- <span>в Казани</span> --}}</h1>
        <p>Предлагаем в аренду строительные вышки-туры, рамные строительные леса, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
    </div>
@endsection

@section('content')
    <section id="gallery">
        <div class="gallery">
            @foreach ($scaff -> reverse()  as $post)
            <div class="gallery-card" itemscope itemtype="http://schema.org/ImageObject">
                <div class="gallery-card__image">
                    @if($post->media == 'MOV' || $post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                    <video  controls="controls">
                        <source src="{{ asset('uploads/' . $post->path) }}"  title="наши сторительные леса на {{$post->objects}}" alt="{{$post->objects}}">
                    </video>
                    @else
                    <a href="{{ 'uploads/' . $post->path }}" class="gallery-show" title="{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}">
                        <picture>
                            <source type="image/webp" srcset="{{ 'uploads/' . $post->path }}">
                            <img itemprop="contentUrl" src="{{ 'uploads/' . $post->path }}" width="320" height="350" title="наши сторительные леса на {{$post->objects}}" alt="{{$post->objects}}">
                        </picture>
                    </a>
                    @endif
                </div>
                <h3><span>Площадь лесов:</span>{{$post->square}} кв.м</h3>
                <p><span>Назначение:</span>{{ $post->appointment }}</p>
                <p><span>Объект:</span>{{$post->objects}}</p>
                <p><span>Дата:</span>{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}</p>
            </div>
            @endforeach
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa8.jpg') }}" class="gallery-show" title="строительные леса казань">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa8.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa8.jpg') }}" width="320" height="350" alt="фасадые работы Шуран">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span>200 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Татарстан. Шуран </p>
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa7.jpg') }}" class="gallery-show" title="аренда стороительных лесов в казани. недорого">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa7.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa7.jpg') }}" width="320" height="350" alt="леса на объекте Званка">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span>396 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Татарстан. Званка </p>
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa6.jpg') }}" class="gallery-show" title="строительные леса для монтажа">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa6.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa6.jpg') }}" width="320" height="350" alt="наши строительные леса на ул.Восстания">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Казань. ул.Восстания </p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa5.jpg') }}" class="gallery-show" title="на каждй стройки нужны строительные леса">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa5.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa5.jpg') }}" width="320" height="350" alt="заказали строительные леса у Аренды Высоты">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~300 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Татарстан. Васильево </p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa4.jpg') }}" class="gallery-show" title="строительные леса с доставкой по казани">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa4.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa4.jpg') }}" width="320" height="350" alt="на улице Горького стоят наши леса">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~400 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Казань. ул.Горького </p>
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa1.jpg') }}" class="gallery-show" title="леса в аренду недорого">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa1.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa1.jpg') }}" width="320" height="350" alt="установили леса в Салмачах">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span>Фасадные работы</p>
                <p><span>Объект:</span>Салмачи </p>
            </div>
            {{-- <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa2.jpg') }}" class="gallery-show" title="строительные леса">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa2.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa2.jpg') }}" width="320" height="350" alt="аренда лесов и тур">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~500 кв.м</h3>
                <!-- <p><span>Назначение:</span>Монтаж утепленного вент фасада (Завершения объекта)</p>
                <p><span>Объект:</span>Иннополис. ул.Университетская </p> -->
            </div> --}}
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/lesa3.jpg') }}" class="gallery-show" title="строительные леса инополис">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/lesa3.jpg') }}">
                            <img src="{{ asset('frontend/img/gallery/lesa3.jpg') }}" width="320" height="350" alt="аренда лесов в Татарстане">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~400 кв.м</h3>
                <!-- <p><span>Назначение:</span>Монтаж утепленного вент фасада (Завершения объекта)</p>
                <p><span>Объект:</span>Иннополис. ул.Университетская </p> -->
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/inopolis_end.jpg') }}" class="gallery-show" title="Иннополис. ул.Университетская">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/inopolis_end.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/inopolis_end.jpg') }}" width="320" height="350" alt="Иннополис. ул.Университетская">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span>Монтаж утепленного вент фасада (Завершения объекта)</p>
                <p><span>Объект:</span>Иннополис. ул.Университетская </p>
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/inpolis-night.jpg') }}" class="gallery-show" title="Иннополис. ул.Университетская">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/inpolis-night.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/inpolis-night.jpg') }}" width="320" height="350" alt="Иннополис" title="Иннополис аренда ">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span>Монтаж утепленного вент фасада</p>
                <p><span>Объект:</span>Иннополис. ул.Университетская </p>
            </div>
        <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/inopolis.jpg') }}" class="gallery-show" title="Иннополис">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/inopolis.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/inopolis.jpg') }}" width="320" height="350" alt="Иннополис" title="Иннополис аренда лесов ">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span>Монтаж утепленного вент фасада</p>
                <p><span>Объект:</span>Иннополис</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/baumana.jpg') }}" class="gallery-show" title="ул. Баумана">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/baumana.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/baumana.jpg') }}" width="320" height="350" alt="аренда строительных лесов" title="наши леса в аренде на ул.Баумана">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~670 кв.м</h3>
                <p><span>Назначение:</span> покраска фасада</p>
                <p><span>Объект:</span> ул. Баумана</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/malyye-mabany.jpg') }}" class="gallery-show" title="п. Малые Кабаны">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/malyye-mabany.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/malyye-mabany.jpg') }}" width="320" height="350" alt="аренда строительных лесов" title="сдаем строительные леса">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~66 кв.м</h3>
                <p><span>Назначение:</span> фасадные работы, подшивка карнизов</p>
                <p><span>Объект:</span> п. Малые Кабаны</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/adelya-kutuya.jpg') }}" class="gallery-show" title="ул. Аделя Кутуя">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/adelya-kutuya.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/adelya-kutuya.jpg') }}" width="320" height="350" alt="аренда лесов Аренда Высоты" title="Аренда Высоты">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~380 кв.м</h3>
                <p><span>Назначение:</span> фасадные работы</p>
                <p><span>Объект:</span> ул. Аделя Кутуя</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/school-gabishevo.jpg') }}" class="gallery-show" title="школа п. Габишево">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/school-gabishevo.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/school-gabishevo.jpg') }}" width="320" height="350" alt="аренда строительных лесов в городе по низким ценам" title="леса по низким ценам">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~360 кв.м</h3>
                <p><span>Назначение:</span> утепление, монтаж вент. фасада</p>
                <p><span>Объект:</span> школа п. Габишево</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/vysokaya-gora.jpg') }}" class="gallery-show" title="п. Высокая Гора">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/vysokaya-gora.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/vysokaya-gora.jpg') }}" width="320" height="350" alt="аренда строительного оборудование" title="аренда строительного оборудование по казани">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~1700 кв.м</h3>
                <p><span>Назначение:</span> утепление, монтаж вент. фасада </p>
                <p><span>Объект:</span> п. Высокая Гора</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/novoye-shigaleyevo.jpg') }}" class="gallery-show" title="п. Новое Шигалеево">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/novoye-shigaleyevo.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/novoye-shigaleyevo.jpg') }}" width="320" height="350" alt="аренда лесов недорого" title="аренда лесов в Татарстане недорого">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~140 кв.м</h3>
                <p><span>Назначение:</span> установка окон, утепление фасада, фасадные работы</p>
                <p><span>Объект:</span> п. Новое Шигалеево</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/rodiny.jpg') }}" class="gallery-show" title="ул. Родины">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/rodiny.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/rodiny.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~130 кв.м</h3>
                <p><span>Назначение:</span> утепление, монтаж вент. фасада </p>
                <p><span>Объект:</span> ул. Родины</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/garden.jpg') }}" class="gallery-show" title="п. Гарден">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/garden.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/garden.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~150 кв.м</h3>
                <p><span>Назначение:</span> остекление, утепление, фасадные работы</p>
                <p><span>Объект:</span> п. Гарден</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/gabishevo.jpg') }}" class="gallery-show" title="п. Габишево">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/gabishevo.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/gabishevo.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~130 кв.м</h3>
                <p><span>Назначение:</span> утепление фасада, штукатурные работы, подшивка карниза</p>
                <p><span>Объект:</span> п. Габишево</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/ulyanova-lenina.jpg') }}" class="gallery-show" title="ул. Ульянова-Ленина">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/ulyanova-lenina.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/ulyanova-lenina.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~2100 кв.м</h3>
                <p><span>Назначение:</span> утепление, облицовка клинкерным кирпичом</p>
                <p><span>Объект:</span> ул. Ульянова-Ленина</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/kasimovykh.jpg') }}" class="gallery-show" title="ул. Бр. Касимовых, 42">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/kasimovykh.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/kasimovykh.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~756 кв.м</h3>
                <p><span>Назначение:</span> ремонтные работы</p>
                <p><span>Объект:</span> ул. Бр. Касимовых, 42</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/kazanskiy-kreml.jpg') }}" class="gallery-show" title="Казанский кремль">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/kazanskiy-kreml.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/kazanskiy-kreml.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> в целом на объекте ~4800 кв.м</h3>
                <p><span>Назначение:</span> фасадные работы</p>
                <p><span>Объект:</span> Казанский кремль</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/night-tower.jpg') }}" class="gallery-show" title="Казанский кремль">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/night-tower.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/night-tower.jpg') }}" width="320" height="350" alt="аренда лесов и тур">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> в целом на объекте ~4800 кв.м</h3>
                <p><span>Назначение:</span> фасадные работы</p>
                <p><span>Объект:</span> Казанский кремль</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/adoratskogo.jpg') }}" class="gallery-show" title="ул. Адоратского, 26А">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/adoratskogo.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/adoratskogo.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> ~408 кв.м</h3>
                <p><span>Назначение:</span> фасадные работы</p>
                <p><span>Объект:</span> ул. Адоратского, 26А</p>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/gallery/peschanyye-kovali.jpg') }}" class="gallery-show" title="пос. Песчанные Ковали">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/gallery/peschanyye-kovali.webp') }}">
                            <img src="{{ asset('frontend/img/gallery/peschanyye-kovali.jpg') }}" width="320" height="350" alt="аренда строительных лесов">
                        </picture>
                    </a>
                </div>
                <h3><span>Площадь лесов:</span> примерно ~800 кв.м</h3>
                <p><span>Назначение:</span> монтаж вентфасада</p>
                <p><span>Объект:</span> пос. Песчанные Ковали</p>
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
