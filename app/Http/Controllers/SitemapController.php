<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function update()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
        return response('Карта сайта успешно обновлена');
    }

    public function autoUpdate()
    {
        // Определяем интервал обновления в неделях
        $updateInterval = 1;

        // Получаем текущую дату и время
        $now = Carbon::now();

        // Получаем последнюю дату обновления карты сайта
        $lastUpdatedDate = Carbon::createFromTimestamp(filemtime(public_path('sitemap.xml')));

        // Рассчитываем следующую дату обновления на основе интервала
        $nextUpdateDate = $lastUpdatedDate->addWeeks($updateInterval);

        // Если следующая дата обновления меньше или равна текущей дате и времени, обновляем карту сайта
        if ($nextUpdateDate <= $now) {
            SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
            return response('Карта сайта успешно обновлена');
        }

        // Если следующая дата обновления больше текущей даты и времени, возвращаем сообщение о том, что обновление не требуется
        return response('Обновление карты сайта не требуется');
    }
}
