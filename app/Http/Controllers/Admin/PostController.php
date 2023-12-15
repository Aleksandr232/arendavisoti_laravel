<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImgTours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;



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
        'media' => 'required'],
        ['media.required' => 'Загрузите фото или видео',
        'media.file' => 'Загруженный файл должен быть фото или видео',
        'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV'
        ]);

    if($request -> hasFile('media')){
        $media = $request->file('media');
        $path = Storage::disk('public')->putFile('posts', $media);

        $file = new Post;
        $file->media = $media->getClientOriginalExtension();

        $file->path = $path;

        // Конвертирование изображения в формат WebP и сохранение только в этом формате
        if (in_array($media->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
            $image = Image::make($media)->encode('webp', 30);
            $webpFilename = $media->hashName() . '.webp';
            $webpPath = 'posts/' . $webpFilename;
            Storage::disk('public')->put($webpPath, $image);

            $file->path = $webpPath;



            // Удаление оригинального файла
            Storage::disk('public')->delete($path);
        }

        // Проверка количества загружаемых видео
        $videoCount = Post::where('media', 'LIKE', '%mp4')
                            ->orWhere('media','LIKE','%avi')
                            ->orWhere('media','LIKE','%mov')
                            ->orWhere('media','LIKE','%MP4')
                            ->orWhere('media','LIKE','%MOV')
                            ->count();
        $maxVideoCount = 5; // Максимальное количество видео

        if ($media->getClientOriginalExtension() == 'mp4' || $media->getClientOriginalExtension() == 'MOV' || $media->getClientOriginalExtension() == 'MP4' ||  $media->getClientOriginalExtension() == 'avi' || $media->getClientOriginalExtension() == 'mov') {
            if ($videoCount >= $maxVideoCount) {

                Storage::disk('public')->delete($path);

                return redirect()->route('posts.index')->with('err', 'Превышено максимальное количество видео. Удалите старые видео для загрузки нового.');
            }
        }

        $file->title = $request->input('title');
        $file->content = $request->input('content');
        $file->save();

        // Генерация sitemap
        $sitemapPath = public_path('sitemap.xml');
        $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

        // Установка пространства имён для элементов image и video
        $sitemapXml->registerXPathNamespace('image', 'http://www.google.com/schemas/sitemap-image/1.1');
        $sitemapXml->registerXPathNamespace('video', 'http://www.google.com/schemas/sitemap-video/1.1');

        // Создание новой записи в sitemap для загруженного медиафайла
        $urlNode = $sitemapXml->addChild('url');
        $urlNode->addChild('loc', url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8'));
        $urlNode->addChild('lastmod', date('Y-m-d\TH:i:sP'));
        $urlNode->addChild('changefreq', 'daily');
        $urlNode->addChild('priority', '0.8');

        // Если файл является изображением
        if($media->getClientOriginalExtension() == 'jpg' ||
            $media->getClientOriginalExtension() == 'jpeg' ||
            $media->getClientOriginalExtension() == 'webp' ||
            $media->getClientOriginalExtension() == 'png') {
            $imageNode = $urlNode->addChild('image:image', '', 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:loc', url('uploads/' . $webpPath), 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:title', $file->title, 'http://www.google.com/schemas/sitemap-image/1.1');
        } else if ($media->getClientOriginalExtension() == 'MP4' ||
        $media->getClientOriginalExtension() == 'mp4' ||
        $media->getClientOriginalExtension() == 'avi' ||
        $media->getClientOriginalExtension() == 'MOV' ||
        $media->getClientOriginalExtension() == 'mov') {
        $videoNode = $urlNode->addChild('video:video', '', 'http://www.google.com/schemas/sitemap-video/1.1');
        $videoNode->addChild('video:thumbnail_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
        $videoNode->addChild('video:title', $file->title, 'http://www.google.com/schemas/sitemap-video/1.1');
        $videoNode->addChild('video:description', 'статьи Аренда Высоты', 'http://www.google.com/schemas/sitemap-video/1.1');
        $videoNode->addChild('video:content_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
        }

        $sitemapXml->asXml($sitemapPath);

    return redirect()->route('posts.index')->with('success', 'Статья  добавлена');
}

}



    public function edit($id)
    {
        $post = Post::query()->find($id);


        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'media' => 'sometimes|file|mimes:jpeg,png,mp4,avi,mov',
        ], [
            'media.required' => 'Загрузите фото или видео',
            'media.file' => 'Загруженный файл должен быть фото или видео',
            'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV',
        ]);

        $file = Post::findOrFail($id);

        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $path = Storage::disk('public')->putFile('posts', $media);

            $file->media = $media->getClientOriginalExtension();
            $file->path = $path;


            if (in_array($media->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
                $image = Image::make($media)->encode('webp', 30);
                $webpFilename = $media->hashName() . '.webp';
                $webpPath = 'posts/' . $webpFilename;
                Storage::disk('public')->put($webpPath, $image);

                $file->path = $webpPath;

                Storage::disk('public')->delete($path);
            }

            $videoExtensions = ['mp4', 'avi', 'mov'];

            if (in_array($media->getClientOriginalExtension(), $videoExtensions)) {
                $videoCount = Post::whereIn('media', $videoExtensions)->count();
                $maxVideoCount = 15; // Максимальное количество видео

                if ($videoCount >= $maxVideoCount) {
                    Storage::disk('public')->delete($path);

                    return redirect()->route('posts.index')->with('err', 'Превышено максимальное количество видео. Удалите старые видео для загрузки нового.');
                }
            }
        }

        $file->title = $request->input('title');
        $file->content = $request->input('content');
        $file->save();

        if($request -> input('title', 'content')){
            return redirect()->route('posts.index')->with('success', 'Статья обновлена');
        }

        // Генерация sitemap
        $sitemapPath = public_path('sitemap.xml');
        $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

        $urlNodes = $sitemapXml->xpath("//url[loc='" . url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D1%81%D1%82%D0%B0%D1%82%D1%8C%D0%B8') . "']");
        if (!$urlNodes) {
            return redirect()->route('posts.index')->with('error', 'Ошибка при обновлении sitemap');
        }
        $urlNode = $urlNodes[0];

        $imageNode = $urlNode->xpath("image:image");
        $videoNode = $urlNode->xpath("video:video");

        // Обновить информацию для изображения или видео
        if ($imageNode) {
            $imageNode[0]->loc = url($file->path);
        }
        if ($videoNode) {
            $videoNode[0]->thumbnail_loc = url($file->path);
            $videoNode[0]->content_loc = url($file->path);
        }

        $sitemapXml->asXML($sitemapPath);

        return redirect()->route('posts.index')->with('success', 'Статья обновлена');
    }



    public function tabs(Request $request, $id)
    {
        $post = Post::find($id);


        if ($post->is_tabs) {
            $post->is_tabs = false;
            $post->order = Post::where('is_tabs', 0)->max('order') + 1;
            $post->save();

            return redirect()->route('posts.index')->with('success', 'Добавили в раздел строительные леса');
        }


        $post->is_tabs = true;
        $post->order_tours = Post::where('is_tabs', 1)->max('order_tours') + 1;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Добавили в раздел вышки-туры');
    }

    public function updateOrder(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Запись не найдена', 404]);
        }

        $post->order_tours = $request->input('order_tours');
        $post->save();

        return response()->json(['success' => 'Изменен порядок позиции: ' . $post->order_tours]);
    }

    public function updateOrderLesa(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Запись не найдена', 404]);
        }

        $post->order = $request->input('order');
        $post->save();

        return response()->json(['success' => 'Изменен порядок позиции: ' . $post->order]);
    }




    public function resetLesa()
    {
        $posts = Post::where('is_tabs', 0)->get();

        foreach ($posts as $post) {
            $post->order = 0;
            $post->save();
        }

        return redirect()->route('lesa')->with('success', 'Порядок лесов сброшен до 0');
    }

    public function resetTours()
    {
        $posts = Post::where('is_tabs', 1)->get();

        foreach ($posts as $post) {
            $post->order_tours = 0;
            $post->save();
        }

        return redirect()->route('tours')->with('success', 'Порядок вышек-тур сброшен до 0');
    }




    public function destroy($id)
    {

    $post = Post::query()->find($id);
    Storage::delete($post->img);
    $post->delete($post->img);
    return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }

}
