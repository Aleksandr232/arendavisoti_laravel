<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logistica;
use Illuminate\Http\Request;

class PostLogistController extends Controller
{
    public function index()
    {
        $logist = Logistica::all();
        return response()->json($logist);

    }








}
