@extends('site.layouts.main')

@section('title', 'Каталог и прайс | Аренда высоты')
@section('description', 'Ознакомьтесь с полным ассортиментом продукции, предлагаемой нашей компанией. Широкий выбор, высокое качество и конкурентные цены')
@section('keywords', 'каталог, продукция, товары, ассортимент, прайс-лист, цены, наша компания')

@section('header_title')
    <div class="header-content my-container">
        <h1>Здесь вы можете скачать каталог и прайс</h1>
    </div>
    <div class="breadcrumbs">
        <a href="/">Главная</a>
        <span> / </span>
        <a>Каталог и прайс</a>
    </div>

@endsection

@section('content')
    <section id="posts">
        <div class="posts">
                <div class="file-card my-container">
                    @if(isset($pricefile))
                        @foreach($pricefile as $post)
                            @if($post->format === 'pdf')
                                <div class="file-item">
                                    <a href="{{ asset('prices/' . $post->filepath) }}" class="file-link" download="{{ $post->filename }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="220px" height="120px" viewBox="0 0 32 32"><title>file_type_pdf2</title><path d="M24.1,2.072h0l5.564,5.8V29.928H8.879V30H29.735V7.945L24.1,2.072" style="fill:#909090"/><path d="M24.031,2H8.808V29.928H29.664V7.873L24.03,2" style="fill:#f4f4f4"/><path d="M8.655,3.5H2.265v6.827h20.1V3.5H8.655" style="fill:#7a7b7c"/><path d="M22.472,10.211H2.395V3.379H22.472v6.832" style="fill:#dd2025"/><path d="M9.052,4.534h-.03l-.207,0H7.745v4.8H8.773V7.715L9,7.728a2.042,2.042,0,0,0,.647-.117,1.427,1.427,0,0,0,.493-.291,1.224,1.224,0,0,0,.335-.454,2.13,2.13,0,0,0,.105-.908,2.237,2.237,0,0,0-.114-.644,1.173,1.173,0,0,0-.687-.65A2.149,2.149,0,0,0,9.37,4.56a2.232,2.232,0,0,0-.319-.026M8.862,6.828l-.089,0V5.348h.193a.57.57,0,0,1,.459.181.92.92,0,0,1,.183.558c0,.246,0,.469-.222.626a.942.942,0,0,1-.524.114" style="fill:#464648"/><path d="M12.533,4.521c-.111,0-.219.008-.295.011L12,4.538h-.78v4.8h.918a2.677,2.677,0,0,0,1.028-.175,1.71,1.71,0,0,0,.68-.491,1.939,1.939,0,0,0,.373-.749,3.728,3.728,0,0,0,.114-.949,4.416,4.416,0,0,0-.087-1.127,1.777,1.777,0,0,0-.4-.733,1.63,1.63,0,0,0-.535-.4,2.413,2.413,0,0,0-.549-.178,1.282,1.282,0,0,0-.228-.017m-.182,3.937-.1,0V5.392h.013a1.062,1.062,0,0,1,.6.107,1.2,1.2,0,0,1,.324.4,1.3,1.3,0,0,1,.142.526c.009.22,0,.4,0,.549a2.926,2.926,0,0,1-.033.513,1.756,1.756,0,0,1-.169.5,1.13,1.13,0,0,1-.363.36.673.673,0,0,1-.416.106" style="fill:#464648"/><path d="M17.43,4.538H15v4.8h1.028V7.434h1.3V6.542h-1.3V5.43h1.4V4.538" style="fill:#464648"/><path d="M21.781,20.255s3.188-.578,3.188.511S22.994,21.412,21.781,20.255Zm-2.357.083a7.543,7.543,0,0,0-1.473.489l.4-.9c.4-.9.815-2.127.815-2.127a14.216,14.216,0,0,0,1.658,2.252,13.033,13.033,0,0,0-1.4.288Zm-1.262-6.5c0-.949.307-1.208.546-1.208s.508.115.517.939a10.787,10.787,0,0,1-.517,2.434A4.426,4.426,0,0,1,18.161,13.841ZM13.513,24.354c-.978-.585,2.051-2.386,2.6-2.444C16.11,21.911,14.537,24.966,13.513,24.354ZM25.9,20.895c-.01-.1-.1-1.207-2.07-1.16a14.228,14.228,0,0,0-2.453.173,12.542,12.542,0,0,1-2.012-2.655,11.76,11.76,0,0,0,.623-3.1c-.029-1.2-.316-1.888-1.236-1.878s-1.054.815-.933,2.013a9.309,9.309,0,0,0,.665,2.338s-.425,1.323-.987,2.639-.946,2.006-.946,2.006a9.622,9.622,0,0,0-2.725,1.4c-.824.767-1.159,1.356-.725,1.945.374.508,1.683.623,2.853-.91a22.549,22.549,0,0,0,1.7-2.492s1.784-.489,2.339-.623,1.226-.24,1.226-.24,1.629,1.639,3.2,1.581,1.495-.939,1.485-1.035" style="fill:#dd2025"/><path d="M23.954,2.077V7.95h5.633L23.954,2.077Z" style="fill:#909090"/><path d="M24.031,2V7.873h5.633L24.031,2Z" style="fill:#f4f4f4"/><path d="M8.975,4.457h-.03l-.207,0H7.668v4.8H8.7V7.639l.228.013a2.042,2.042,0,0,0,.647-.117,1.428,1.428,0,0,0,.493-.291A1.224,1.224,0,0,0,10.4,6.79a2.13,2.13,0,0,0,.105-.908,2.237,2.237,0,0,0-.114-.644,1.173,1.173,0,0,0-.687-.65,2.149,2.149,0,0,0-.411-.105,2.232,2.232,0,0,0-.319-.026M8.785,6.751l-.089,0V5.271H8.89a.57.57,0,0,1,.459.181.92.92,0,0,1,.183.558c0,.246,0,.469-.222.626a.942.942,0,0,1-.524.114" style="fill:#fff"/><path d="M12.456,4.444c-.111,0-.219.008-.295.011l-.235.006h-.78v4.8h.918a2.677,2.677,0,0,0,1.028-.175,1.71,1.71,0,0,0,.68-.491,1.939,1.939,0,0,0,.373-.749,3.728,3.728,0,0,0,.114-.949,4.416,4.416,0,0,0-.087-1.127,1.777,1.777,0,0,0-.4-.733,1.63,1.63,0,0,0-.535-.4,2.413,2.413,0,0,0-.549-.178,1.282,1.282,0,0,0-.228-.017m-.182,3.937-.1,0V5.315h.013a1.062,1.062,0,0,1,.6.107,1.2,1.2,0,0,1,.324.4,1.3,1.3,0,0,1,.142.526c.009.22,0,.4,0,.549a2.926,2.926,0,0,1-.033.513,1.756,1.756,0,0,1-.169.5,1.13,1.13,0,0,1-.363.36.673.673,0,0,1-.416.106" style="fill:#fff"/><path d="M17.353,4.461h-2.43v4.8h1.028V7.357h1.3V6.465h-1.3V5.353h1.4V4.461" style="fill:#fff"/></svg>
                                        <p>{{ $post->filename }}</p>
                                    </a>
                                </div>
                            @elseif($post->format === 'xlsx')
                                <div class="file-item">
                                    <a href="{{ asset('prices/' . $post->filepath) }}" class="file-link" download="{{ $post->filename }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="220px" height="120px" viewBox="0 0 32 32"><title>file_type_excel2</title><path d="M28.781,4.405H18.651V2.018L2,4.588V27.115l16.651,2.868V26.445H28.781A1.162,1.162,0,0,0,30,25.349V5.5A1.162,1.162,0,0,0,28.781,4.405Zm.16,21.126H18.617L18.6,23.642h2.487v-2.2H18.581l-.012-1.3h2.518v-2.2H18.55l-.012-1.3h2.549v-2.2H18.53v-1.3h2.557v-2.2H18.53v-1.3h2.557v-2.2H18.53v-2H28.941Z" style="fill:#20744a;fill-rule:evenodd"/><rect x="22.487" y="7.439" width="4.323" height="2.2" style="fill:#20744a"/><rect x="22.487" y="10.94" width="4.323" height="2.2" style="fill:#20744a"/><rect x="22.487" y="14.441" width="4.323" height="2.2" style="fill:#20744a"/><rect x="22.487" y="17.942" width="4.323" height="2.2" style="fill:#20744a"/><rect x="22.487" y="21.443" width="4.323" height="2.2" style="fill:#20744a"/><polygon points="6.347 10.673 8.493 10.55 9.842 14.259 11.436 10.397 13.582 10.274 10.976 15.54 13.582 20.819 11.313 20.666 9.781 16.642 8.248 20.513 6.163 20.329 8.585 15.666 6.347 10.673" style="fill:#ffffff;fill-rule:evenodd"/></svg>
                                        <p>{{ $post->filename }}</p>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

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
