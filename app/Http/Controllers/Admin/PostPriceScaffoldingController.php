<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceScaff;
use App\Models\PriceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostPriceScaffoldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricescaff = PriceScaff::all();

        return view('admin.postpricescaff.index', compact('pricescaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postpricescaff.create');
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
            $path = Storage::disk('prices')->putFile('pricescaff', $img);

            $file = new PriceScaff;
            $file->img = $img->getClientOriginalName();
            $file->path = $path;
            $file->save();
        }


        return redirect()->route('pricescaff.index')->with('success', 'Прайс строительных лесов добавлен');
    }


    public function PriceLesabot(){
        $img = PriceScaff::first();
        $file = PriceFile::first();

        $PriceScaff = [
            'path' =>"https://xn--80aagge2ckkol0hd.xn--p1ai/prices/".$img->path,
            'filepath'=>"https://xn--80aagge2ckkol0hd.xn--p1ai/prices/".$file->filepath
        ];

        return response()->json(['price' => $PriceScaff], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceScaff  $priceScaff
     * @return \Illuminate\Http\Response
     */
    public function show(PriceScaff $priceScaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceScaff  $priceScaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pricescaff = PriceScaff::query()->find($id);;

        return view('admin.postpricescaff.edit', compact('pricescaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceScaff  $priceScaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $priceScaff = PriceScaff::findOrFail($id);

        $request->validate([
            'img' => 'sometimes|required',
        ],
        [
            'img.required' => 'Загрузите фотографию сотрудника',
        ]);

    if($request->hasFile('img')){
        Storage::disk('prices')->delete($priceScaff->path);

        $img = $request->file('img');
        $path = Storage::disk('prices')->putFile('pricescaff', $img);

        $priceScaff->img = $img->getClientOriginalName();
        $priceScaff->path = $path;
    }

        $priceScaff->save();

        return redirect()->route('pricescaff.index')->with('success', 'Запись успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceScaff  $priceScaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = PriceScaff::find($id); //находим объект файла в базе данных по id
        if(!$file) return false; //если запись о файле в базе данных не найдена, возвращаем false
        Storage::disk('prices')->delete($file->path);//удаляем файл с диска
        $file->delete(); //удаляем запись о файле из базы данных
        return redirect()->route('pricescaff.index')->with('success', 'Файл удален');
    }
}
