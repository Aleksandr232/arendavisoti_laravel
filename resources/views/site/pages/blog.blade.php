@extends('site.layouts.main')

@section('title', 'Блог «Аренда высоты»')
@section('description', 'Предлагаем в аренду передвижные строительные вышки-туры с доставкой по Казани по самым выгодным ценам «Аренда высоты»')
@section('keywords', 'вышка тура авито, вышка тура, вышка тура казань, вышка тура строительная, вышка тура аренда, вышка тура 2 2, вышка тура передвижная, вышка тура +на колесах, вышка тура аренда казань')

@section('header_title')
    <div class="header-content my-container">
        <h1>Блог <span>Аренды высоты</span></h1>
        <p>Предлагаем в аренду рамные строительные леса, строительные вышки-туры, раздвижные лестницы. Дополнительно оказываем услуги на минитракторе МКСМ, а также услуги строительного альпинизма по очистке снега с крыш. Осуществляем доставку оборудования нашим автотранспортом по Казани и Республике Татарстан</p>
    </div>
@endsection

@section('content')
    <section id="posts">
        <div class="posts">
            @php
                $counter = 1;
            @endphp

            @foreach ($blog as $post)
                @if($counter % 2 == 0)
                    <div class="odd">
                        <div class="posts-card my-container">
                            <div class="pc-image pc-image__revers">
                                @if($post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov' || $post->media == 'MOV')
                                <video class="video_blog"  controls="controls">
                                    <source src="{{ asset('blog/' . $post->path) }}" title="{{$post->title}}"  alt="новый пост про {{$post->title}}">
                                </video>
                                @else
                                <img src="{{ 'blog/' . $post->path }}" title="{{$post->title}}" alt="новый пост про {{$post->title}}">
                                @endif
                            </div>
                            <a href="{{ route('blogid', $post->id) }}">
                                <div class="pc-content pc-content__revers">
                                    <h2>{{ $post->title }}</h2>
                                    <div id="block{{$post->id}}"   class="content_block hide">
                                        <div  class="content_text">{!! $post->content !!}</div>
                                    </div>
                                    <a class="blog_toggle"  href="{{ route('blogid', $post->id) }}">Подробнее</a>
                                </div>
                            </a>
                        </div>
                    </div>
                @else
                    <div class="even">
                        <div class="posts-card my-container">
                            <div class="pc-image">
                                @if($post->media == 'MP4' || $post->media == 'mp4' || $post->media == 'avi' || $post->media == 'mov' || $post->media == 'MOV')
                                <video class="video_blog"   controls="controls">
                                    <source src="{{ asset('blog/' . $post->path) }}" title="{{$post->title}}"  alt="новый пост про {{$post->title}}">
                                </video>
                                @else
                                <img src="{{ 'blog/' . $post->path }}" title="{{$post->title}}" alt="новый пост про {{$post->title}}">
                                @endif
                            </div>
                            <a   href="{{ route('blogid', $post->id) }}">
                            <div class="pc-content">
                                <h2>{{ $post->title }}</h2>
                                <div id="block{{$post->id}}"  class="content_block hide">
                                    <div class="content_text">{!! $post->content !!}</div>
                                </div>
                                <a class="page_toggle"  href="{{ route('blogid', $post->id) }}">Подробнее</a>
                            </div>
                            </a>
                        </div>
                    </div>
                @endif
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>
        <div  class="card-footer clearfix">
            {{ $blog->links()}}

        </div>
    </section>
    <!-- include our-products start -->
    <section id="towers-tour__recommendations">
        <div class="our-services__title my-container">
            <h2>Возможно вас заинтересует</h2>
        </div>
        <div class="tt-recommendations my-container">
            <div class="op-main">
                <div class="op-main__card">
                    <a href="{{ route('gallery') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-1.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-1.jpg') }}" width="670" height="350" alt="аренда лесов и вышек-тур">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Галерея наших вышек-тур</h2>
                    <a href="{{ route('gallery') }}" class="op-card__link">Подробнее →</a>
                </div>
                <div class="op-main__card">
                    <a href="{{ route('scaffolding') }}">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('frontend/img/tour-towers/recommendations-2.webp') }}">
                            <img src="{{ asset('frontend/img/tour-towers/recommendations-2.jpg') }}" width="670" height="350" alt="аренда лесов и вышек-тур">
                        </picture>
                    </a>
                    <h2 class="op-card__title">Рамные строительные леса</h2>
                    <a href="{{ route('scaffolding') }}" class="op-card__link">Подробнее →</a>
                </div>
            </div>
            @include('site.inc.products_additional')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
