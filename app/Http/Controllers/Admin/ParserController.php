<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ParserController extends Controller
{
    public function parse()
    {
        $client = new Client();
        $response = $client->get('https://yandex.ru/maps/org/arenda_vysoty/186521182233/reviews/?ll=49.259802%2C55.731465&z=16'); // Замените URL-адресом, с которым вы хотите взаимодействовать

        $body = $response->getBody(); // Получение тела ответа
        $data = json_decode($body); // Преобразование тела ответа в формат JSON

        // Ваш код для обработки полученных данных

        return "Данные успешно спарсены!";
    }
}
