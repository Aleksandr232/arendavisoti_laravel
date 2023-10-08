<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostScaff;
use App\Models\PostImgTours;

class HomeController extends Controller
{
    public function index()
    {
        $scaff = PostScaff::query()->paginate(30);
        $tours = PostImgTours::query()->paginate(30);
        return view('site.home.index', compact('scaff', 'tours'));
    }

}
