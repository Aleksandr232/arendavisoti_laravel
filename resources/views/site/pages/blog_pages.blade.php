@extends('site.layouts.main')

@section('title', $blogid->titles)
@section('description', $blogid->description)
@section('keywords', $blogid->keywords)

@section('header_title')
    <div class="header-content my-container">
        <h1>{{ $blogid->title }}</h1>
    </div>
@endsection

@section('content')
    <section id="posts">
        <div class="posts">
                <div class="posts-card my-container">
                    <div class="pc-image pc-image_revers">
                        @if($blogid->media === 'MP4' || $blogid->media === 'mp4' || $blogid->media === 'avi' || $blogid->media === 'mov' || $blogid->media === 'MOV')
                        <video class="video_blog"  controls="controls">
                            <source src="{{ asset('blog/' . $blogid->path) }}" title="{{$blogid->title}}"  alt="новый пост про {{$blogid->title}}">
                        </video>
                        @else
                        <img src="{{ asset('blog/' . $blogid->path) }}" title="{{$blogid->title}}" alt="новый пост про {{$blogid->title}}">
                        @endif
                    </div>
                    <div class="pc-content pc-content_revers">
                        <div id="block{{$blogid->id}}" class="content_block hide">
                            <div class="content_text">{!! $blogid->content !!}</div>
                        </div>
                        <a class="content_toggle" data-target="#block{{$blogid->id}}" href="#">Подробнее</a>
                    </div>
                </div>
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
