<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostScaff;
use App\Models\PostImgTours;
use App\Models\UserIp;
use App\Models\RunStr;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $active = RunStr::all()->first();

        if($active->is_technical == 1){
            return view('errors.500');
        }else{

        $scaff = PostScaff::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);

        $ip = $request->ip();
        $data = \Location::get($ip);

        // Проверяем успешность получения информации о местоположении
        if ($data) {
            // Сохраняем информацию о городе пользователя в модели UserIp
            $userip = new UserIp;
            $userip->ip = $data->ip;
            $userip->cityName= $data->cityName;
            $userip->regionName= $data->regionName;
            $userip->countryName= $data->countryName;
            $userip->save();
        }

            return view('site.home.index', compact('scaff', 'tours'));
        }
    }



}
