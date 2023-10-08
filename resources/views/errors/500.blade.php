<!doctype html>
<html lang="ru">
<head>
    <meta content=”nofollow”/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт не работает</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#4c9017">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- favicon end -->
    <link rel="stylesheet" href="{{ asset('frontend/css/critical.css') }}">
</head>
<body>
<main>
    <div class="server-error my-container">
        <div class="server-error__content">
            <h2>Сайт временно не работает</h2>
            <p>Вы можете попробовать перейти на главную страницу</p>
            <a href="{{ url('/') }}">
                На главную →
            </a>
        </div>
    </div>
</main>

<script>
    function loadStyle(url) {
        let link = document.createElement('link');
        link.href = url;
        link.rel = 'stylesheet';
        document.body.appendChild(link);
    }

    loadStyle('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Oswald:wght@500;700&display=swap');
</script>
</body>
</html>
