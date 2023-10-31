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
            'filename' => 'required',
        ],
        [
            'filename.required' => 'Загрузите файл прайса',

        ]);

        if($request -> hasFile('filename')){
            $filename = $request->file('filename');
            $filepath = Storage::disk('prices')->putFile('pricefile', $filename);

            $file = new PriceFile;
            $file->filename = $filename->getClientOriginalName();
            $file->filepath = $filepath;
            $file->save();
        }


        return redirect()->route('postpricefile.create')->with('success', 'Файл добавлен');

        /* return back()->withInput()->with('success', 'успех'); */
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
    public function destroy(PriceFile $priceFile)
    {
        //
    }
}
