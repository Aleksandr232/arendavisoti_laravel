<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImgTours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    public function index()
    {

        $posts = Post::query()
        ->orderByDesc('id')
        ->paginate(10);


        return view('admin.posts.index', compact('posts'));

    }


    public function lesa()
    {
        $lesa = Post::all();

        return view('admin.post_lesa.index', compact('lesa'));
    }


    public function tours()
    {
        $tours = Post::all();

        return view('admin.post_tours.index', compact('tours'));
    }




    public function create()
    {
        return view('admin.posts.create');
    }




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
        $data['img'] = Post::uploadImage($request);



        $post = Post::query()->create($data);


        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }



    public function edit($id)
    {
        $post = Post::query()->find($id);


        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
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

        $post = Post::query()->find($id);
        $data = $request->all();

        if ($file = Post::uploadImage($request, $post->img)) {
            $data['img'] = $file;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }



    public function tabs(Request $request, $id)
    {
        $post = Post::find($id);


        if ($post->is_tabs) {
            $post->is_tabs = false;
            $post->save();

            return redirect()->route('posts.index')->with('success', 'Добавили в раздел строительные леса');
        }


        $post->is_tabs = true;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Добавили в раздел вышки-туры');
    }


    public function order(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post) {
            $maxOrder = Post::max('order');
            $maxOrderTours = Post::max('order_tours');

            if ($post->is_tabs == 0) {
                $post->order = $maxOrder + 1;
                $post->save();

                return redirect()->route('lesa')->with('success', 'Порядок лесов изменен: ' . $post->order);
            } else {
                // Perform custom order handling for istabs = 1
                // Add your own logic here

                // Example: set the order to the maximum order value and save
                $post->order_tours = $maxOrderTours + 1;
                $post->save();

                return redirect()->route('tours')->with('success', 'Порядок вышек-тур изменен: ' . $post->order_tours);
            }
        } else {
            return redirect()->route('posts.index')->with('error', 'Запись не найдена');
        }
    }

    public function orders(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post) {
            $maxOrder = Post::max('order');
            $maxOrderTours = Post::max('order_tours');

            if ($post->is_tabs == 0) {
                $post->order = $maxOrder - 1;
                $post->save();

                return redirect()->route('lesa')->with('success', 'Порядок лесов изменен: ' . $post->order);
            } else {
                $post->order_tours = $maxOrderTours - 1;
                $post->save();

                return redirect()->route('tours')->with('success', 'Порядок вышек-тур изменен: ' . $post->order_tours);
            }
        } else {
            return redirect()->route('posts.index')->with('error', 'Запись не найдена');
        }
    }


    public function destroy($id)
    {

    $post = Post::query()->find($id);
    Storage::delete($post->img);
    $post->delete($post->img);
    return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }

}
