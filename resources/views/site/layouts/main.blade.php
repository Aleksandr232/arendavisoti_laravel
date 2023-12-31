<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="googlebot" content="all">
    <meta name="robots" content="all">
    <meta name="yandex" content="all" />
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('frontend/img/favicon/safari-pinned-tab.svg') }}" color="#4c9017">
    <meta name="yandex-verification" content="28995526bf02ce7b" />
    <meta name="google-site-verification" content="5-H6xsRiI339Q3cQhqAO9jUexDebDY1RUvC4l9F6mSU" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/critical.css') }}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- favicon end -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">



    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "ym");

    ym(95417663, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true
    });
 </script>
 <noscript><div><img src="https://mc.yandex.ru/watch/95417663" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->

    <style>
        html, body, #map {
            width: 100%;
            height: 50%;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>

<header>
    @include('site.inc.header')
</header>

@yield('header_title')

<main>
    <div id="app"></div>
    @yield('content')
</main>

@include('site.inc.footer')

@include('site.inc.modal_window')

@include('site.inc.modal_discounts')

@include('site.inc.moadal_card')

@include('site.inc.loader')

<script>
    function loadStyle(url) {
        let link = document.createElement('link');
        link.href = url;
        link.rel = 'stylesheet';
        document.body.appendChild(link);
    }

    loadStyle("{{ asset('frontend/css/style.css') }}");
    loadStyle('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;700&family=Oswald:wght@400;500;700&display=swap');
</script>


<script>
    if(!sessionStorage.getItem('visited')) {
    var loader = document.querySelector('.loader');
    var btnTheme = document.querySelector('.theme-btn');

    var stocks = document.getElementById('runningString');
    // Показываем индикатор загрузки
    loader.style.display = 'block';
    btnTheme.style.display="none";
    stocks.style.display="none";
    document.body.style.overflow = 'hidden';
    // Устанавливаем sessionStorage
    sessionStorage.setItem('visited', 'true');
    // Скрываем индикатор загрузки через 2 секунды
    setTimeout(function() {
        loader.style.display = 'none';
        btnTheme.style.display="block";
        stocks.style.display="block";
        document.body.style.overflow = '';
    }, 2000);
    } else {
        var loader = document.querySelector('.loader');
        // Скрываем индикатор загрузки
        loader.style.display = 'none';
        btnTheme.style.display="block";
        stocks.style.display="block";
        document.body.style.overflow = '';
    }
</script>


<script>
    const dropdowns = document.querySelectorAll('.down');
    const submenus = document.querySelectorAll('.submenu');
    let openIndex = null;

    dropdowns.forEach((dropdown, index) => {
      dropdown.addEventListener('click', function (event) {
        const submenu = submenus[index];
        if (submenu.classList.contains('show')) {
          submenu.classList.remove('show');
          openIndex = null;
        } else {
          if (openIndex !== null && openIndex !== index) {
            submenus[openIndex].classList.remove('show');
          }
          submenu.classList.add('show');
          openIndex = index;
        }
        event.stopPropagation();
      });
    });

    document.addEventListener('mousedown', function (event) {
        const target = event.target;
        let isInsideSubmenu = false;
        submenus.forEach((submenu) => {
            if (submenu.contains(target)) {
                isInsideSubmenu = true;
            }
        });

        if (!isInsideSubmenu && openIndex !== null) {
            submenus[openIndex].classList.remove('show');
            openIndex = null;
        }
    });
</script>

  <script>
    const resume = document.getElementById('resume');
    const me_site = document.getElementById('me_site');
        resume.addEventListener('mouseenter', function() {
        me_site.style.display="block";
    });

    resume.addEventListener('mouseleave', function() {
        setTimeout(function() {
            me_site.style.display = "none";
        }, 10000);
    });

  </script>

<script async src="{{ asset('frontend/js/script.js') }}"></script>
<script async src="{{ asset('frontend/js/running-string.js') }}"></script>
<script  src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script defer src="{{ asset('frontend/js/hidden_text.js') }}"></script>
<script defer src="{{ asset('frontend/js/tabs.js') }}"></script>
<script defer src="{{ asset('frontend/js/modal.js') }}"></script>
<script async src="https://res.smartwidgets.ru/app.js" ></script>
{{-- <div id="app"></div> --}}

<script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
