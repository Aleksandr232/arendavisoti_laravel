@extends('site.layouts.gallery_snow_removal')

@section('title', 'Уборка снега с крыш «Аренда высоты»')
@section('description', 'Предлагаем в аренду минитрактор МКСМ, лестницы раздвижные, вышки-туры, рамные леса, услуги по очистке снега с крыш «Аренда высоты»')
@section('keywords', 'очистка крыш +от снега, уборка снега +с крыш, минитрактор аренда, минитрактор авито, минитрактора +в татарстане, минитрактор казань, строительный альпинизм')

@section('header_title')
    <div class="header-content my-container">
        <h1>Уборка снега с крыш <span>в Казани</span></h1>
        <p>Предлагаем уборку снега и удаление сосулек и наледи с крыш, профессиональными промышленными альпинистами, с гарантией сохранности вашей кровли и водостоков. У нас вы можете заказать разовую услугу или заключить договор на абонентское обслуживание на определенный период времени</p>
    </div>
@endsection

@section('content')
    <section id="gallery">
        <div class="gallery">
            @foreach ($snow  as $post)
            <div class="gallery-card">
                    @if($post->media == 'MOV' || $post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov')
                    <video  controls="controls">
                        <source src="{{ asset('snow/' . $post->path) }}"  title="" alt="}">
                    </video>
                    @else
                    <div class="gallery-card__image">
                        <a href="{{ 'snow/' . $post->path }}" class="gallery-show" title="{{$result = date('Y-m-d H:i:s', strtotime($post->created_at) + 3 * 3600);}}">
                            <picture>
                                <source type="image/webp" srcset="{{ 'snow/' . $post->path }}">
                                <img itemprop="contentUrl" src="{{ 'snow/' . $post->path }}" width="320" height="350" title="уборка снега с крыш Казань" alt="уборка снега с крыш Казань">
                            </picture>
                        </a>
                    </div>
                    @endif
            </div>
            @endforeach

        </div>
        <div  class="card-footer clearfix">
            {{ $snow->links()}}

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
