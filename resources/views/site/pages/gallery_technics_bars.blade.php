@extends('site.layouts.gallery_technics_bars')

@section('title', 'Аренда строительного оборудования в Казани «Аренда высоты»')
@section('description', 'минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, очистка кровли, уборка снега с крыш')
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
        @foreach ($tractor -> reverse() as $post)
        <div class="gallery-card">
                @if($post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                <video  controls="controls">
                    <source src="{{ asset('uploads/' . $post->path) }}"  title="минитрактор Казань" alt="минитрактор Казань">
                </video>
                @else
                <div class="gallery-card__image">
                <a href="{{ 'uploads/' . $post->path }}" class="gallery-show" title="{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}">
                    <picture>
                        <source type="image/webp" srcset="{{ 'uploads/' . $post->path }}">
                        <img  src="{{ 'uploads/' . $post->path }}" width="320" height="350" title="минитрактор Казань" alt="минитрактор Казань">
                    </picture>
                </a>
                </div>
                @endif
        </div>
        @endforeach
        <div class="gallery-card">
            <div class="gallery-card__image">
                <a href="{{ asset('frontend/img/technics/texnica3.jpg') }}" class="gallery-show" title="Погрузчик, минитрактор">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica3.webp') }}">
                        <img src="{{ asset('frontend/img/technics/texnica3.jpg') }}" width="320" height="350" alt="минитрактор аренда">
                    </picture>
                </a>
            </div>
       </div>
       <div class="gallery-card">
            <div class="gallery-card__image">
                <a href="{{ asset('frontend/img/technics/bars9.jpg') }}" class="gallery-show" title="Погрузчик, минитрактор">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('frontend/img/technics/bars9.webp') }}">
                        <img src="{{ asset('frontend/img/technics/bars9.jpg') }}" width="320" height="350" alt="минитрактор аренда">
                    </picture>

                </a>
            </div>
       </div>
       <div class="gallery-card">
            <div class="gallery-card__image">
                        <div>
                            <video controls="controls">
                                <source src="../../../../public/frontend/video/barsik6.mp4">
                            </video>
                        </div>
                </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                    <div>
                        <video controls="controls">
                            <source src="../../../../public/frontend/video/bars2.MP4">
                        </video>
                    </div>
            </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsik_snow1.MOV">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsik_snow2.MP4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsik_snow3.MP4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsik_snow4.MP4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/newbars1.MOV">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/newbars2.MOV">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsiknews1.MP4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/barsiknews2.MP4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/bars_snow1.mp4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/bars_snow2.mp4">
                    </video>
                </div>
        </div>
        </div>
        <div class="gallery-card">
            <div class="gallery-card__image">
                <div>
                    <video controls="controls">
                        <source src="../../../../public/frontend/video/bars_kzn.MOV">
                    </video>
                </div>

            </div>
        </div>
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
