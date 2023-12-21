<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class MarketTgController extends Controller
{



    public function checkConnection()
{
    $api_key = 'ae96f8af992a3d5eb732eb5c1c2c5da4';
    $url = 'https://arenda-lesov-kazan.ru/mod/api/?api_key=' . $api_key . '&method=getLeads';

    try {
        // Отправка запроса и получение ответа
        $response = file_get_contents($url);

        // Проверка статуса ответа
        if ($response === FALSE) {
            // Если произошла ошибка при выполнении запроса
            echo 'Произошла ошибка при выполнении запроса';
        } else {
            // Если запрос был успешным, обрабатываем полученные данные
            echo 'Ответ от сервера: ' . $response;
            // Здесь может быть дополнительная логика для обработки ответа

            // Парсинг полученных данных
            $data = json_decode($response, true);

            // Сохранение имени и номера телефона в базе данных
           /*  $name = $data['name'];
            $phone = $data['phone']; */
            /* MarketTgResponse::create(['name' => $name, 'phone' => $phone); */
        }
    } catch (Exception $e) {
        // Обработка исключений, если они возникнут
        echo 'Произошла ошибка: ' . $e->getMessage();
    }
}









}
