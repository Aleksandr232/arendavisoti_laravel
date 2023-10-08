<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostTexnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostTexnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texnica = PostTexnica::query()->paginate(10);

        return view('admin.posttexnica.index', compact('texnica') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posttexnica.create');
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
            'text_img' => 'required',
            'img' => 'required|image||max:10240'
        ],
        [
            'text_img.required' => 'Напишите название техники',
            'img.required' => 'Загрузите фотографию',
            'img.image' => 'Фотография статьи должна быть файлом изображения',
            'img.max' => 'Фотография статьи не должна превышать размер 10 мб',
        ]);

        $data = $request->all();
        $data['img'] = PostTexnica::uploadImage($request);



        $texnica = PostTexnica::query()->create($data);


        return redirect()->route('poststexnica.index')->with('success', 'Фото техника добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostTexnica  $postTexnica
     * @return \Illuminate\Http\Response
     */
    public function show(PostTexnica $postTexnica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostTexnica  $postTexnica
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTexnica $postTexnica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostTexnica  $postTexnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostTexnica $postTexnica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostTexnica  $postTexnica
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTexnica $postTexnica)
    {
        //
    }
}
