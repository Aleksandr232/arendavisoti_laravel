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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="manifest" href="{{ asset('frontend/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('frontend/img/favicon/safari-pinned-tab.svg') }}" color="#4c9017">
    <link rel="canonical" href="https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D1%81%D0%BA%D0%BB%D0%B0%D0%B4%D0%BE%D0%B2" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="">
    <meta name="googlebot" content="all">
    <meta name="robots" content="all">
    <meta name="yandex" content="all" />
    <!-- favicon end -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/critical.css') }}">
    <script defer src="{{ asset('frontend/js/script.js') }}"></script>

    <meta name="google-site-verification" content="5-H6xsRiI339Q3cQhqAO9jUexDebDY1RUvC4l9F6mSU" />
    <meta name="yandex-verification" content="1096a1a99c1e0da8" />

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

@include('site.inc.moadal_card')

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

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
    loadStyle('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Oswald:wght@500;700&display=swap');
</script>

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="{{ asset('frontend/js/jquery.magnific-popup.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('.gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1], // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        return item.el.attr('title');
                    }
                }
            });
        });
    });
</script>
<script>
    const dropdown = document.querySelector('.down');
    const submenu = document.querySelector('.submenu');

    dropdown.addEventListener('click', function() {
      submenu.classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
      const target = event.target;
      if (!submenu.contains(target) && !dropdown.contains(target)) {
        submenu.classList.remove('show');
      }

    });
  </script>

</body>
</html>
