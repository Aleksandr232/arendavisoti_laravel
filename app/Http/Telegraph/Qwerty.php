<?php

declare(strict_types=1);

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Facades\Storage;

class Qwerty extends WebhookHandler
{


    public function start()
    {

        $this->chat->html('Привет, это компания Аренда Высоты')->send();

	sleep(1);

	$this->chat
		->message('Выберите услугу')
		->keyboard(Keyboard::make()->buttons([
                    Button::make('Строительные леса')->action('lesa')->param('value', 'lesa'),
		            Button::make('Вышки-туры')->action('tours')->param('value', 'tours'),
            ])
		)->send();
    }

    public function lesa():void{
        $this->chat
            ->html('Вы хотите заказать строительные леса?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('ДА')->action('yes')->param('value', 'yes'),
                Button::make('НЕТ')->action('no')->param('value', 'no'),
    ])
        )->send();

    }

    public function tours():void{
        $this->chat
            ->html('Вы хотите заказать вышки-туры?')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('ДА')->action('yes_tours')->param('value', 'yes_tours'),
                Button::make('НЕТ')->action('no')->param('value', 'no'),
    ])
        )->send();

    }

    public function yes_tours():void{
        $this->chat
            ->html('Предлагаем в аренду передвижные строительные вышки-туры «Балатон» высотой от 2-х до 21,3 метра. Вышка-тура «Балатон» считается лидером среди конкурентов. Отличается устойчивостью и безопасностью. Производится из лучших марок стали. Подходит для наружных и внутренних строительных работ')
            ->photo('https://xn--80aagge2ckkol0hd.xn--p1ai/uploads/images/2023-07-29/HnD4oTchoiR8wj3iVr1Jz9owKAuVuVVgv2LhTDty.jpg')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Цены')->action('price_tours')->param('value', 'price_tours'),
            ])

            )->send();

    }

    public function yes():void{
        $this->chat
            ->html('Предлагаем в аренду строительные леса, предназначенные для работ на высоте до 40 метров. Это прочные и универсальные конструкции, которые используются при внутренней или внешней отделке зданий от малых до крупных объектов')
            ->photo('https://xn--80aagge2ckkol0hd.xn--p1ai/frontend/img/stroitelnye-lesa/stroitelnye-lesa-1.jpg.pagespeed.ce.EmlE-mCsw3.jpg')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Цены')->action('price')->param('value', 'price'),
            ])

            )->send();

    }

    public function price():void{
        $this->chat
            ->html('Цены могут меняться в зависимости от сезона и объема взятого в аренду оборудования')
            ->photo('https://арендавысоты.рф/prices/pricescaff/Ih6mhYO5u2OKyFpRO2IwaCxbWjHynXYIdgw7ugJz.jpg.pagespeed.ce.8n1d4076Yy.jpg')
            ->send();

    }

    public function price_tours():void{
        $this->chat
            ->html('Цены могут меняться в зависимости от сезона и объема взятого в аренду оборудования')
            ->photo('https://арендавысоты.рф/prices/pricetours/WDoKvcD1iclbhGoWFYtvAmk4Bb1YOARLaI0KlDa8.jpg.pagespeed.ce.k3oj8Be6Zz.jpg')
            ->send();

    }



    public function no():void{
        $this->chat
            ->html('Могу предложить другие услуги')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Грузоперевозки')->action('texnica')->param('value', 'texnica'),
                Button::make('Минитрактор')->action('tractor')->param('value', 'tractor'),
                Button::make('Уборка снега с крыш')->action('snow')->param('value', 'snow'),
                Button::make('Лестницы раздвижные')->action('ladder')->param('value', 'ladder'),
    ])
        )->send();
    }
}
