<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock=Stock::all();

        return view('admin.stock.index', compact('stock'));
    }

    public function index1()
    {
        $stock=Stock::all();

        return view('admin.stocklesa.index', compact('stock'));
    }

    public function index2()
    {
        $stock=Stock::all();

        return view('admin.stocktours.index', compact('stock'));
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

            $stock = new Stock();
            $stock->tractor = $request->input('tractor');
            $stock->lesa = $request->input('lesa');
            $stock->texnica = $request->input('texnica');
            $stock->tours = $request->input('tours');
            $stock->gazelnew = $request->input('gazelnew');
            $stock->gazelold = $request->input('gazelold');

            $user = Auth::user();
            if ($user && $user->username) {
                $stock->username = $user->username;
            }

            $stock->rama = $request->input('rama');
            $stock->ramadioganal = $request->input('ramadioganal');
            $stock->conect = $request->input('conect');
            $stock->nastil = $request->input('nastil');
            $stock->rigel = $request->input('rigel');
            $stock->bash = $request->input('bash');
            $stock->jack = $request->input('jack');
            $stock->footing1_5 = $request->input('footing1_5');
            $stock->area0_45 = $request->input('area0_45');
            $stock->rama1_2 = $request->input('rama1_2');
            $stock->rigel2 = $request->input('rigel2');
            $stock->link0_7 = $request->input('link0_7');
            $stock->rama1_1 = $request->input('rama1_1');
            $stock->emphasis = $request->input('emphasis');
            $stock->footing0_7 = $request->input('footing0_7');
            $stock->area07_15 = $request->input('area07_15');
            $stock->rama0_7 = $request->input('rama0_7');
            $stock->rigel1_5 = $request->input('rigel1_5');
            $stock->rama0_7_1 = $request->input('rama0_7_1');
            $stock->footing2_4 = $request->input('footing2_4');
            $stock->pipe = $request->input('pipe');
            $stock->rama1_4 = $request->input('rama1_4');
            $stock->link0_9 = $request->input('link0_9');
            $stock->save();

            return response()->json(['message' => 'Данные со склада отправлены'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function updateApi(Request $request, $id)
    {
    $stock = Stock::find($id);

    if (!$stock) {
        return response()->json(["message" => "Запись не найдена"], 404);
    }

    if ($request->has('tractor')) {
        $stock->tractor = $request->input('tractor');
    }

    if ($request->has('lesa')) {
        $stock->lesa = $request->input('lesa');
    }

    if ($request->has('texnica')) {
        $stock->texnica = $request->input('texnica');
    }

    if ($request->has('tours')) {
        $stock->tours = $request->input('tours');
    }

    if ($request->has('gazelnew')) {
        $stock->gazelnew = $request->input('gazelnew');
    }

    if ($request->has('gazelold')) {
        $stock->gazelold = $request->input('gazelold');
    }

    if (Auth::check()) {
        $username = Auth::user()->name;
        $stock->username = $username;
        $stock->save();
    }


    if ($request->has('rama')) {
        $stock->rama = $request->input('rama');
    }

    if ($request->has('ramadioganal')) {
        $stock->ramadioganal = $request->input('ramadioganal');
    }

    if ($request->has('conect')) {
        $stock->conect = $request->input('conect');
    }

    if ($request->has('nastil')) {
        $stock->nastil = $request->input('nastil');
    }

    if ($request->has('rigel')) {
        $stock->rigel = $request->input('rigel');
    }

    if ($request->has('bash')) {
        $stock->bash = $request->input('bash');
    }

    if ($request->has('jack')) {
        $stock->jack = $request->input('jack');
    }

    if ($request->has('footing1_5')) {
        $stock->footing1_5 = $request->input('footing1_5');
    }

    if ($request->has('area0_45')) {
        $stock->area0_45 = $request->input('area0_45');
    }

    if ($request->has('rama1_2')) {
        $stock->rama1_2  = $request->input('rama1_2');
    }

    if ($request->has('rigel2')) {
        $stock->rigel2  = $request->input('rigel2');
    }

    if ($request->has('link0_7')) {
        $stock->link0_7  = $request->input('link0_7');
    }

    if ($request->has('rama1_1')) {
        $stock->rama1_1  = $request->input('rama1_1');
    }

    if ($request->has('emphasis')) {
        $stock->emphasis  = $request->input('emphasis');
    }

    if ($request->has('footing0_7')) {
        $stock->footing0_7  = $request->input('footing0_7');
    }

    if ($request->has('area07_15')) {
        $stock->area07_15  = $request->input('area07_15');
    }

    if ($request->has('rama0_7')) {
        $stock->rama0_7  = $request->input('rama0_7');
    }

    if ($request->has('rigel1_5')) {
        $stock->rigel1_5  = $request->input('rigel1_5');
    }

    if ($request->has('rama0_7_1')) {
        $stock->rama0_7_1  = $request->input('rama0_7_1');
    }

    if ($request->has('footing2_4')) {
        $stock->footing2_4  = $request->input('footing2_4');
    }

    if ($request->has('pipe')) {
        $stock->pipe   = $request->input('pipe');
    }

    if ($request->has('rama1_4')) {
        $stock->rama1_4 = $request->input('rama1_4');
    }

    if ($request->has('link0_9')) {
        $stock->link0_9 = $request->input('link0_9');
    }

    $stock->save();


    return response()->json(['message' => 'Данные со склада обновлены'], 200);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
