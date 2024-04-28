<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostPriceFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pricefile = PriceFile::all();

        return view('admin.postpricefile.create', compact('pricefile'));
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
            'filename.*' => 'required',
        ],
        [
            'filename.*.required' => 'Загрузите хотя бы один файл прайса',
        ]);

        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $file) {
                $filepath = Storage::disk('prices')->putFile('pricefile', $file);

                $priceFile = new PriceFile;
                $priceFile->filename = $file->getClientOriginalName();
                $priceFile->format = $file->getClientOriginalExtension();
                $priceFile->filepath = $filepath;
                $priceFile->save();
            }
        }

        return redirect()->route('postpricefile.create')->with('success', 'Файл(ы) добавлен(ы)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceFile  $priceFile
     * @return \Illuminate\Http\Response
     */
    public function show(PriceFile $priceFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceFile  $priceFile
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceFile $priceFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceFile  $priceFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceFile $priceFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceFile  $priceFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $priceFiles = PriceFile::query()->get();

        foreach ($priceFiles as $priceFile) {
            Storage::disk('prices')->delete($priceFile->filepath);
            $priceFile->delete();
        }

        return redirect()->route('postpricefile.create')->with('success', 'Все файлы удалены');
    }
}
