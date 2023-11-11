<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserTg;

class TgUsController extends Controller
{
    public function index()
    {
        $chatIds = UserTg::pluck('chat_id')->toArray();

        return response()->json($chatIds);
    }
}
