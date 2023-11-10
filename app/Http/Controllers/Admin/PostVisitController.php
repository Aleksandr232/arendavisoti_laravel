<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserIp;
use Carbon\Carbon;

class PostVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Получаем количество посещений, сгруппированных по дате и городу
        $visits = UserIp::selectRaw('(CASE
                                            WHEN cityName = "Moscow" THEN "Москва"
                                            WHEN cityName = "St Petersburg" THEN "Санкт-Петербург"
					    WHEN cityName = "Kazan" THEN "Казань"
                                            WHEN cityName = "Ufa" THEN "Уфа"
                                            WHEN cityName = "Perm" THEN "Перьм"
                                            WHEN cityName = "Samara" THEN "Самара"
                                            WHEN cityName = "Stolbishche" THEN "Столбище"
                                            WHEN cityName = "Rostov-on-Don" THEN "Ростов-на-Дону"
                                            WHEN cityName = "Gatchina" THEN "Гатчина"
                                            WHEN cityName = "Nizhnekamsk" THEN "Нижнекамск"
                                            WHEN cityName = "Naberezhnyye Chelny" THEN "Набережные Челны"
                                            ELSE cityName
                                        END) as city, COUNT(*) as count')
            ->groupBy('city')
            ->get();

        // Возвращаем список посещений в формате JSON
        return response()->json($visits);
    }

    public function index2()
    {
        // Получаем общее количество посещений, сгруппированных по месяцу
        $totalVisits = UserIp::selectRaw('DATE_FORMAT(created_at, "%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        // Преобразуем числовое значение месяца в строковое значение
        $totalVisits = $totalVisits->map(function ($visit) {
            $visit['month'] = $this->getMonthName($visit['month']);
            return $visit;
        });

        // Возвращаем список общего количества посещений за каждый месяц в формате JSON
        return response()->json($totalVisits);
    }

    private function getMonthName($month)
    {
        $monthNames = [
            '01' => 'Январь',
            '02' => 'Февраль',
            '03' => 'Март',
            '04' => 'Апрель',
            '05' => 'Май',
            '06' => 'Июнь',
            '07' => 'Июль',
            '08' => 'Август',
            '09' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь',
        ];

        if (isset($monthNames[$month])) {
            return $monthNames[$month];
        } else {
            return 'Неверный месяц';
        }

        return $monthNames[$month];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
