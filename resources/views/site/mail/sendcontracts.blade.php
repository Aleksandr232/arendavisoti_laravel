
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Письмо с сайта</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">
</head>
<style>
    body {
        font-family: sans-serif;
    }
    h1 {
        text-align: center;
        font-weight: 700;
        font-size: 20px;
        margin-top: 20%;
        line-height: 130%;
        color: #000;
    }



</style>
<body>

    @extends('vendor.mail.html.header')

    <h1>Новое сообщение от ООО "Аренда высоты"</h1>
    <p>Получено новое сообщение от {{ $data['name'] }}:</p>
    <p>{{  $data['message']  }}</p>
</body>
</html>

