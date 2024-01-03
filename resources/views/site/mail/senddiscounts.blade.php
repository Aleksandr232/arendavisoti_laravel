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


    <p>Получено новое сообщение от ООО "АРЕНДА ВЫСОТЫ":</p>
    <p>Ваш уникальный код:"{{  $data['code']  }}"</p>


	{{-- @include('vendor.mail.html.button') --}}
	<div class="mf-social__networks">
                <a href="https://wa.me/+79867120059" title="Напишите нам в Whatsapp" target="_blank">
                   <img width="23" height="23" src="https://img.icons8.com/color/23/whatsapp--v1.png" alt="whatsapp--v1"/>
                </a>
                <a href="https://www.instagram.com/arenda_visoti" title="Мы в Instagram" target="_blank">
                    <img width="23" height="23" src="https://img.icons8.com/3d-fluency/23/instagram-new.png" alt="instagram-new"/>
                </a>
                <a href="https://vk.com/arenda_visoti" title="Мы ВКонтакте" target="_blank">
                    <img width="23" height="23" src="https://img.icons8.com/color/23/vk-com.png" alt="vk-com"/>
                </a>
                <a href="https://www.facebook.com/arenda.visoti" title="Мы в Facebook" target="_blank">
                    <img width="23" height="23" src="https://img.icons8.com/color/23/facebook.png" alt="facebook"/>
                </a>
                <a href="https://t.me/HireHeightsbot" title="Напиши боту" target="_blank">
                    <img width="23" height="23" src="https://img.icons8.com/fluency/23/telegram-app.png" alt="telegram-app"/>
                </a>
            </div>
</body>
</html>
