<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceTours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostPriceToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricetours = PriceTours::all();

        return view('admin.postpricetours.index', compact('pricetours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postpricetours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required',
        ],
        [

            'img.required' => 'Загрузите фотографию сотрудника',

        ]);

        if($request -> hasFile('img')){
            $img = $request->file('img');
            $path = Storage::disk('prices')->putFile('pricetours', $img);

            $file = new PriceTours;
            $file->img = $img->getClientOriginalName();
            $file->path = $path;
            $file->save();
        }


        return redirect()->route('pricetours.index')->with('success', 'Прайс вышки-тур добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function show(PriceTours $priceTours)
    {
        //
    }


    public function PriceToursbot(){
        $tours = PriceTours::first();

        $PriceTours = [
            'path' =>"https://xn--80aagge2ckkol0hd.xn--p1ai/prices/".$tours->path,
        ];

        return response()->json(['price'=>$PriceTours], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricetours = PriceTours::query()->find($id);;

        return view('admin.postpricetours.edit', compact('pricetours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $pricetours = PriceTours::findOrFail($id);

        $request->validate([
            'img' => 'sometimes|required',
        ],
        [
            'img.required' => 'Загрузите фотографию сотрудника',
        ]);

    if($request->hasFile('img')){
        Storage::disk('prices')->delete($pricetours->path);

        $img = $request->file('img');
        $path = Storage::disk('prices')->putFile('pricetours', $img);

        $pricetours->img = $img->getClientOriginalName();
        $pricetours->path = $path;
    }

        $pricetours->save();

        return redirect()->route('pricetours.index')->with('success', 'Запись успешно обновлена!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $file = PriceTours::find($id); //находим объект файла в базе данных по id
        if(!$file) return false; //если запись о файле в базе данных не найдена, возвращаем false
        Storage::disk('prices')->delete($file->path);//удаляем файл с диска
        $file->delete(); //удаляем запись о файле из базы данных
        return redirect()->route('pricetours.index')->with('success', 'Файл удален');
    }
}
