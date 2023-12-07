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
        $nextUpdateDate = $lastUpdatedDate->copy()->addWeeks($updateInterval);

        // Получаем текущий час (0-23)
        $currentHour = $now->hour;

        // Проверяем, наступило ли нужное время обновления (например, 3 часа ночи)
        if ($nextUpdateDate <= $now && $currentHour === 3) {
            // Генерируем новую карту сайта
            SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
            return response('Карта сайта успешно обновлена');
        }

        // Если следующая дата обновления больше текущей даты и времени, или не наступило нужное время, возвращаем сообщение о том, что обновление не требуется
        return response('Обновление карты сайта не требуется');
    }

    public function update_dev()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        return redirect()->route('admin')->with('success', 'Карта сайта успешно обновлена');
    }
}
