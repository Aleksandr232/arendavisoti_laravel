@extends('site.layouts.main')

@section('title', '404 Страница не найдена')

@section('content')
    <div class="not-found my-container">
        <img src="{{ asset('frontend/img/404/not-found.svg') }}" width="700" alt="">
        <h2>Такой страницы нет на нашем сайте</h2>
        <a href="{{ url('/') }}">← Вернутся на главную</a>
    </div>
    <!-- include our-products start -->
    <section id="gallery-recommendations">
        <div class="our-services__title my-container">
            <h2>Возможно вас заинтересует</h2>
        </div>
        <div class="gallery-recommendations my-container">
            @include('site.inc.main_products')
            @include('site.inc.products_additional')
        </div>
    </section>
    <!-- include our-products end -->
@endsection
