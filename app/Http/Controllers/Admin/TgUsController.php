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

    public function store(Request $request)
    {
        $chatId = $request->input('chat_id');
        $name = $request->input('name');

        // Проверяем, есть ли уже запись в базе данных с таким chatid и name
        $existingChat = UserTg::where('chat_id', $chatId)->where('name', $name)->first();

        if ($existingChat) {
            return response()->json(['message' => 'Данные уже существуют'], 409);
        }

        // Создаем новую запись и сохраняем ее в базе данных
        $chatIds = new UserTg();
        $chatIds->chat_id = $chatId;
        $chatIds->name = $name;
        $chatIds->save();

        // Возврат ответа в виде подтверждения сохранения
        return response()->json(['message' => 'Chat ID успешно сохранен', 200]);
    }
}
