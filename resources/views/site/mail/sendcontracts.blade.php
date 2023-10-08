
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Письмо с сайта</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
</head>
<body>

    @include('vendor.mail.html.header')

    <h1> от ООО "Аренда высоты"</h1>
    <p>Получено новое сообщение от {{ $data['stat'] }}  {{ $data['name'] }}:</p>
    <p>{{  $data['message']  }}</p>
</body>
</html>

