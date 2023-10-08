<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {

        return view('director.home.index');

    }
}
