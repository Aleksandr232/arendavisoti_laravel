<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('frontend/img/favicon/safari-pinned-tab.svg') }}" color="#4c9017">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon end -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="stylesheet" href="{{ asset('frontend/css/critical.css') }}">
    <script defer src="{{ asset('frontend/js/script.js') }}"></script>

    <meta name="google-site-verification" content="5-H6xsRiI339Q3cQhqAO9jUexDebDY1RUvC4l9F6mSU" />
    <meta name="yandex-verification" content="1811d7fb98bdaac0" />
    <meta name="googlebot" content="all">
    <meta name="robots" content="all">
    <meta name="yandex" content="all" />

     <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(92353844, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/92353844" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
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
    @yield('content')
</main>

@include('site.inc.footer')

@include('site.inc.modal_window')

@include('site.inc.loader')

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
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=159d1b30-bef0-463b-a7f6-b69cba7ec8e9" type="text/javascript"></script>
<script src='../../../../public/frontend/js/map.js'></script>
<script>
    if(!sessionStorage.getItem('visited')) {
    var loader = document.querySelector('.loader');
    var btnTheme = document.querySelector('.theme-btn');
    /* var modal_home = document.querySelector('.modal_home');
    var modal_tours = document.querySelector('.modal_tours'); */

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
    document.addEventListener('DOMContentLoaded', function() {
  animateRunningString();
  hideRunningStringOnScroll();
});

let animationInterval; // Глобальная переменная для хранения интервала анимации

function animateRunningString() {
  let element = document.getElementById('runningString');
  let position = 0;

  animationInterval = setInterval(() => {
    position++;
    element.style.left = position + 'px';

    if (position >= window.innerWidth) {
      position = -element.offsetWidth;
    }
  }, 10);
}

function hideRunningStringOnScroll() {
  let element = document.getElementById('runningString');
  let animationInterval;

  function startAnimation() {
    // Здесь вместо animationInterval нужно использовать идентификатор интервала анимации, чтобы его можно было остановить
    animationInterval = setInterval(/* код анимации */);
  }

  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 0) {
      element.style.display = 'none';
      clearInterval(animationInterval); // Останавливаем интервал анимации
    } else {
      element.style.display = 'block'; // Сбрасываем стиль display на block, чтобы бегущая строка снова отображалась
      startAnimation(); // Запускаем анимацию
    }
  });
}
</script>
<script  defer src="{{ asset('frontend/js/modalHome_Tours.js') }}"></script>
</body>
</html>
