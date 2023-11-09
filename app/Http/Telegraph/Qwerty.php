<?php

declare(strict_types=1);

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

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
		            Button::make('Вышки-туры')->action('lesa')->param('value', 'tours'),
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
