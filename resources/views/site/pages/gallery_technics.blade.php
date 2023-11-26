@extends('site.layouts.gallery_technics')

@section('title', 'Грузоперевозки «Аренда высоты»')
@section('description', 'Предлагаем в аренду минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, услуги по очистке снега с крыш «Аренда высоты»')
@section('keywords', 'очистка крыш +от снега, уборка снега +с крыш, минитрактор аренда, минитрактор авито, минитрактора +в татарстане, минитрактор казань, строительный альпинизм')

@section('header_title')
    <div class="header-content my-container">
        <h1>Грузоперевозки <span>в Казани</span></h1>
        <p>Предлагаем в аренду строительные вышки-туры, рамные строительные леса, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
    </div>
@endsection

@section('content')
    <section id="gallery">
        <div class="gallery">
            @foreach ($texnica as $post)
            <div class="gallery-card">
                <div class="gallery-card__image">
                    @if($post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                    <video  controls="controls">
                        <source src="{{ asset('uploads/' . $post->path) }}"  alt="грузоперевозки казань {{$post->img_text}}" title="грузоперевозки казань {{$post->img_text}}">
                    </video>
                    @else
                    <a href="{{ 'uploads/' . $post->path }}" class="gallery-show" title="{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}">
                        <picture>
                            <source type="image/webp" srcset="{{ 'uploads/' . $post->path  }}">
                            <img src="{{ 'uploads/' . $post->path }}" width="320" height="350" alt="грузоперевозки казань {{$post->img_text}}" title="грузоперевозки казань {{$post->img_text}}">
                        </picture>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/texnica1.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica1.webp') }}">
                            <img src="{{ asset('frontend/img/technics/texnica1.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/texnica2.jpg') }}" class="gallery-show" title="Газель фургон длинной 4,30м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/texnica2.webp') }}">
                            <img src="{{ asset('frontend/img/technics/texnica2.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/gaz3.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/gaz3.webp') }}">
                            <img src="{{ asset('frontend/img/technics/gaz3.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news3.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news3.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news3.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news4.jpg') }}" class="gallery-show" title="Газель фургон длинной 4,30м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news4.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news4.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news5.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news5.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news5.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news6.jpg') }}" class="gallery-show" title="Газель фургон длинной 4,30м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news6.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news6.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news7.jpg') }}" class="gallery-show" title="Наша техника">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news7.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news7.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news8.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news8.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news8.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news9.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news9.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news9.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news10.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news10.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news10.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news11.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news11.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news11.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news12.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news12.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news12.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news13.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news13.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news13.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news14.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news14.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news14.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news15.jpg') }}" class="gallery-show" title="Газель, фургон длинной 5м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news15.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news15.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news16.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news16.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news16.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="gallery-card">
                <div class="gallery-card__image">
                    <a href="{{ asset('frontend/img/technics/news17.jpg') }}" class="gallery-show" title="Пятитонник ISUZU фургон длинной 6,20м">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/technics/news17.jpg') }}">
                            <img src="{{ asset('frontend/img/technics/news17.jpg') }}" width="320" height="350" alt="Грузоперевозки Казань">
                        </picture>
                    </a>
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
