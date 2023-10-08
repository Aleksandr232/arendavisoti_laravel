<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostImgTours;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImgToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = PostImgTours::query()
        ->orderByDesc('id')
        ->paginate(10);


        return view('admin.postimgtours.index', compact('tours') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postimgtours.create');
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
            'title' => 'required',
            'content' => 'required',
            'img' => 'required|image||max:10240',
        ],
        [
            'title.required' => 'Поле заголовок статьи должно быть заполнено',
            'content.required' => 'Поле описание статьи должно быть заполнено',
            'img.required' => 'Загрузите фотографию статьи',
            'img.image' => 'Фотография статьи должна быть файлом изображения',
            'img.max' => 'Фотография статьи не должна превышать размер 10 мб',
        ]);

        $data = $request->all();
        $data['img'] = PostImgTours::uploadImage($request);



        $tours = PostImgTours::query()->create($data);


        return redirect()->route('postsimgtours.index')->with('success', 'Фото туры добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostImgTours  $postImgTours
     * @return \Illuminate\Http\Response
     */
    public function show(PostImgTours $postImgTours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostImgTours  $postImgTours
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tours = PostImgTours::query()->find($id);


        return view('admin.postimgtours.edit', compact('tours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostImgTours  $postImgTours
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'img' => 'image|max:10240',
            ],
            [
                'title.required' => 'Поле заголовок статьи должно быть заполнено',
                'content.required' => 'Поле описание статьи должно быть заполнено',
                'img.image' => 'Фотография статьи должна быть файлом изображения',
                'img.max' => 'Фотография статьи не должна превышать размер 10 мб',
            ]);

            $tours = PostImgTours::query()->find($id);
            $data = $request->all();

            if ($file = PostImgTours::uploadImage($request, $tours->img)) {
                $data['img'] = $file;
            }

            $tours->update($data);

            return redirect()->route('postsimgtours.index')->with('success', 'Изменения сохранены');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostImgTours  $postImgTours
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostImgTours $tours)
    {
        $postImgTours->delete();
    }
}
