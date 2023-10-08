<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostScaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostScaffoldingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scaff = PostScaff::query()
        ->orderByDesc('id')
        ->paginate(10);


        return view('admin.postscaff.index', compact('scaff') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('admin.postscaff.create');
        }
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
            'square' => 'required',
            'objects' => 'required',
            'appointment' => 'required',
            'img' => 'required|image||max:10240',
        ],
        [
            'square.required' => 'Поле заголовок статьи должно быть заполнено',
            'objects.required' => 'Поле описание статьи должно быть заполнено',
            'appointment.required' => 'Поле описание статьи должно быть заполнено',
            'img.required' => 'Загрузите фотографию статьи',
            'img.image' => 'Фотография статьи должна быть файлом изображения',
            'img.max' => 'Фотография статьи не должна превышать размер 10 мб',
        ]);

        $data = $request->all();
        $data['img'] = PostScaff::uploadImage($request);



        $scaff = PostScaff::query()->create($data);


        return redirect()->route('postscaff.index')->with('success', 'Фото лесов добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostScaff  $postScaff
     * @return \Illuminate\Http\Response
     */
    public function show(PostScaff $postScaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostScaff  $postScaff
     * @return \Illuminate\Http\Response
     */
    public function edit(PostScaff $postScaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostScaff  $postScaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostScaff $postScaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostScaff  $postScaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scaff = PostScaff::query()->find($id);
        Storage::delete($scaff->img);
        $scaff->delete($scaff->img);
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
