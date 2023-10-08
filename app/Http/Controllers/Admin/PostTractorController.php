<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostTractor;
use Illuminate\Http\Request;

class PostTractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tractor = PostTractor::query()->paginate(10);

        return view('admin.posttractor.index', compact('tractor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posttractor.create');
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
            'img' => 'required|image||max:10240'
        ],
        [
            'img.required' => 'Загрузите фотографию',
            'img.image' => 'Фотография статьи должна быть файлом изображения',
            'img.max' => 'Фотография статьи не должна превышать размер 10 мб',
        ]);

        $data = $request->all();
        $data['img'] = PostTractor::uploadImage($request);



        $tractor = PostTractor::query()->create($data);


        return redirect()->route('poststractor.index')->with('success', 'Фото минитрактора добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostTractor  $postTractor
     * @return \Illuminate\Http\Response
     */
    public function show(PostTractor $postTractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostTractor  $postTractor
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTractor $postTractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostTractor  $postTractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostTractor $postTractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostTractor  $postTractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTractor $postTractor)
    {
        //
    }
}
