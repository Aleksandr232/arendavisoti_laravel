@extends('site.layouts.gallery_warehouse')

@section('title', 'Склад «Аренда высоты»')
@section('description', 'Предлагаем в аренду минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, услуги по очистке снега с крыш «Аренда высоты»')
@section('keywords', 'очистка крыш +от снега, уборка снега +с крыш, минитрактор аренда, минитрактор авито, минитрактора +в татарстане, минитрактор казань, строительный альпинизм')

@section('header_title')
    <div class="header-content my-container">
        <h1>Наши склады <span>в Казани</span></h1>
        <p>Видео и фото наших складов, также предлагаем аренду склада</p>
    </div>
@endsection

@section('content')
    <section id="gallery">
        <div class="gallery">
            @foreach ($warehouse as $post)
            <div class="gallery-card">
                <div class="gallery-card__image">
                    @if($post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                    <video  controls="controls">
                        <source src="{{ asset('warehouse/' . $post->path) }}"  alt="склад аренды высоты">
                    </video>
                    @else
                    <a href="{{ 'warehouse/' . $post->path }}" class="gallery-show" title="{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}">
                        <picture>
                            <source type="image/webp" srcset="{{ 'warehouse/' . $post->path  }}">
                            <img src="{{ 'warehouse/' . $post->path }}" width="320" height="350" alt="склад аренды высоты">
                        </picture>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        <div  class="card-footer clearfix">
            {{ $warehouse->links()}}

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
