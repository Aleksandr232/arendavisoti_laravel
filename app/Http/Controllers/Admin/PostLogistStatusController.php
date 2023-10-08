<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
/* use App\Models\Logistatus; */
use App\Models\Logistica;
use Illuminate\Http\Request;

class PostLogistStatusController extends Controller
{
    public function index()
    {
        $statusLogist = Logistatus::all();
        return response()->json($statusLogist);
    }

    public function updateStatusLogist(Request $request)
    {


        /* if (!$statusLogist) {
            return response()->json(['error' => 'Статус не найден'], 404);
        } */

        $status = $request->input('status');
        $user = auth()->user();

        if ($status == 'в пути' || $status == 'на месте' || $status == 'еду на склад') {
            // Получение текущего статуса пользователя
            $currentUserStatus = Logistica::where('user_id', $user->id)->first();

            // Если найден текущий статус, перезаписываем его
            if ($currentUserStatus) {
                $currentUserStatus->status = $status;
                $currentUserStatus->save();
            } else {
                // Если у пользователя еще нет статуса, создаем новый
                $newStatusLogist = new Logistica;
                $newStatusLogist->status = $status;
                $newStatusLogist->user_id = $user->id;
                $newStatusLogist->save();
            }

            return response()->json(['Статус обновлен', 200]);

        } else {
            return response()->json(['Статус не обновлен', 401]);
        }
    }


}
