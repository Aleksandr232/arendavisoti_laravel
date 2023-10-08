<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logistica;
use Illuminate\Http\Request;

class LogisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.logistics.index');
    }

    public function logistica()
    {
        return $this->hasOne(Logistica::class);
    }


    public function saveLocation(Request $request)
{
    $user = auth()->user(); // Получить текущего аутентифицированного пользователя

    $latitude = floatval($request->latitude);
    $longitude = floatval($request->longitude);

    $data =[
        'latitude' => $latitude,
        'longitude' => $longitude
    ];

    $coordinates = [$latitude, $longitude];

    // Получить последний сохраненный ранее объект логистики пользователя
    $lastLogistica = $user->logistica()->latest()->first();

    // Если есть предыдущий объект логистики, то обновить его местоположение,
    // иначе создать новый объект логистики
    if ($lastLogistica) {
        $lastLogistica->update([
            'coordinates' => $coordinates,
            'username' => $user->name,
       ]);
    } else {
        $user->logistica()->create([
            'username' => $user->name,
            'coordinates' => $coordinates
        ]);
    }

    return response()->json(['Местоположение успешно сохранено', 200]);
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
     * @param  \App\Models\Logistica  $logistica
     * @return \Illuminate\Http\Response
     */
    public function show(Logistica $logistica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logistica  $logistica
     * @return \Illuminate\Http\Response
     */
    public function edit(Logistica $logistica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logistica  $logistica
     * @return \Illuminate\Http\Response
     */
    public function updateLocation(Request $request, $id)
    {
        $latitude = floatval($request->latitude);
        $longitude = floatval($request->longitude);

        $data =[
            'latitude' => $latitude,
            'longitude' => $longitude
        ];

        $coordinates = [$latitude, $longitude];

        $logistica = Logistica::findOrFail($id);
        $logistica->update([
            'coordinates' => $coordinates
    ]);

        return response('Местоположение успешно обновлено', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logistica  $logistica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logistica $logistica)
    {
        //
    }
}
