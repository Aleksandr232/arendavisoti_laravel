<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PostBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::query()
        ->orderByDesc('id')
        ->paginate(3);

        return view('admin.postblog.index', compact('blog'));
    }

    /* public function blog_seo(Request $request, $id)
    {
        $blog = Blog::query()->find($id);

        return view('', compact('blog'));
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postblog.create');
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
            'media' => 'required'],
            ['media.required' => 'Загрузите фото или видео',
            'media.file' => 'Загруженный файл должен быть фото или видео',
            'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV'
            ]);


        if($request -> hasFile('media')){
            $media = $request->file('media');
            $path = Storage::disk('blog')->putFile('blog_files', $media);

            $file = new Blog;
            $file->media = $media->getClientOriginalExtension();
            $file->title = $request->input('title');
            $file->content = $request->input('content');
            $file->path = $path;


            // Конвертирование изображения в формат WebP и сохранение только в этом формате
            if (in_array($media->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                $image = Image::make($media)->encode('webp', 75);
                $webpFilename = $media->hashName() . '.webp';
                $webpPath = 'blog_files/' . $webpFilename;
                Storage::disk('blog')->put($webpPath, $image);

                $file->path = $webpPath;



                // Удаление оригинального файла
                Storage::disk('blog')->delete($path);
            }

            // Проверка количества загружаемых видео
            $videoCount = Blog::where('media', 'LIKE', '%mp4')
                                ->orWhere('media','LIKE','%avi')
                                ->orWhere('media','LIKE','%mov')
                                ->orWhere('media','LIKE','%MP4')
                                ->count();
            $maxVideoCount = 5; // Максимальное количество видео

            if ($media->getClientOriginalExtension() == 'mp4' ||$media->getClientOriginalExtension() == 'MP4' ||  $media->getClientOriginalExtension() == 'avi' || $media->getClientOriginalExtension() == 'mov') {
                if ($videoCount >= $maxVideoCount) {

                    Storage::disk('Blog')->delete($path);

                    return redirect()->route('postsblog.index')->with('err', 'Превышено максимальное количество видео. Удалите старые видео для загрузки нового.');
                }
            }

            $file->save();

            // Генерация sitemap
            $sitemapPath = public_path('sitemap.xml');
            $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

            // Установка пространства имён для элементов image и video
            $sitemapXml->registerXPathNamespace('image', 'http://www.google.com/schemas/sitemap-image/1.1');
            $sitemapXml->registerXPathNamespace('video', 'http://www.google.com/schemas/sitemap-video/1.1');

            // Создание новой записи в sitemap для загруженного медиафайла
            $urlNode = $sitemapXml->addChild('url');
            $urlNode->addChild('loc', url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B1%D0%BB%D0%BE%D0%B3'));
            $urlNode->addChild('lastmod', date('Y-m-d\TH:i:sP'));
            $urlNode->addChild('changefreq', 'daily');
            $urlNode->addChild('priority', '0.8');

            // Если файл является изображением
            if($media->getClientOriginalExtension() == 'jpg' ||
                $media->getClientOriginalExtension() == 'jpeg' ||
                $media->getClientOriginalExtension() == 'webp' ||
                $media->getClientOriginalExtension() == 'png') {
                $imageNode = $urlNode->addChild('image:image', '', 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageNode->addChild('image:loc', url('blog/' . $webpPath), 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageNode->addChild('image:title', 'Блог Аренды Высоты', 'http://www.google.com/schemas/sitemap-image/1.1');
            } else if ($media->getClientOriginalExtension() == 'MP4' ||
            $media->getClientOriginalExtension() == 'mp4' ||
            $media->getClientOriginalExtension() == 'avi' ||
            $media->getClientOriginalExtension() == 'mov') {
            $videoNode = $urlNode->addChild('video:video', '', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:thumbnail_loc', url('blog/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:title', 'Блог Аренды Высоты', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:description', 'Наш блог', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:content_loc', url('blog/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            }

            // Сохранение обновленного sitemap.xml
            $sitemapXml->asXml($sitemapPath);
        }

        return redirect()->route('postsblog.index')->with('success', 'Пост добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::query()->find($id);


        return view('admin.postblog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'media' => 'required',
        ], [
            'media.required' => 'Загрузите фото или видео',
            'media.file' => 'Загруженный файл должен быть фото или видео',
            'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV',
        ]);

        $file = Blog::query()->find($id);

        if (!$file) {
            return redirect()->route('postsblog.index')->with('err', 'Запись не найдена');
        }

        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $path = Storage::disk('blog')->putFile('blog_files', $media);

            $file->media = $media->getClientOriginalExtension();
            $file->path = $path;
        }

        $file->title = $request->input('title');
        $file->content = $request->input('content');

        // Конвертирование изображения в формат WebP и сохранение только в этом формате
        if (in_array($media->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
            $image = Image::make($media)->encode('webp', 30);
            $webpFilename = $media->hashName() . '.webp';
            $webpPath = 'blog_files/' . $webpFilename;
            Storage::disk('blog')->put($webpPath, $image);

            $file->path = $webpPath;



            // Удаление оригинального файла
            Storage::disk('blog')->delete($path);
        }

        // Проверка количества загружаемых видео
        $videoCount = Blog::where('media', 'LIKE', '%mp4')
                            ->orWhere('media','LIKE','%avi')
                            ->orWhere('media','LIKE','%mov')
                            ->orWhere('media','LIKE','%MP4')
                            ->orWhere('media','LIKE','%MOV')
                            ->count();
        $maxVideoCount = 5; // Максимальное количество видео

        if ($media->getClientOriginalExtension() == 'mp4' || $media->getClientOriginalExtension() == 'MOV' || $media->getClientOriginalExtension() == 'MP4' ||  $media->getClientOriginalExtension() == 'avi' || $media->getClientOriginalExtension() == 'mov') {
            if ($videoCount >= $maxVideoCount) {

                Storage::disk('blog')->delete($path);

                return redirect()->route('postsblog.index')->with('err', 'Превышено максимальное количество видео. Удалите старые видео для загрузки нового.');
            }
        }


        $file->update();

        // Генерация sitemap
        $sitemapPath = public_path('sitemap.xml');
        $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

        // Найти узел с URL адресом для обновляемой записи
        $urlNodes = $sitemapXml->xpath("//url[loc='" . url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B1%D0%BB%D0%BE%D0%B3') . "']");
        if (!$urlNodes) {
            return redirect()->route('postsblog.index')->with('error', 'Ошибка при обновлении sitemap');
        }
        $urlNode = $urlNodes[0];

        // Обновить информацию для изображения или видео
        $imageNode = $urlNode->xpath("image:image");
        $videoNode = $urlNode->xpath("video:video");

        if ($media->getClientOriginalExtension() == 'jpg' ||
            $media->getClientOriginalExtension() == 'jpeg' ||
            $media->getClientOriginalExtension() == 'webp' ||
            $media->getClientOriginalExtension() == 'png') {
            if (!$imageNode) {
                $imageNode = $urlNode->addChild('image:image', '', 'http://www.google.com/schemas/sitemap-image/1.1');
            }
            $imageNode[0]->addChild('image:loc', url('blog/' . $file->webpPath), 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode[0]->addChild('image:title', 'Блог Аренды Высоты', 'http://www.google.com/schemas/sitemap-image/1.1');

            // Remove video node if exists
            if ($videoNode) {
                unset($videoNode[0][0]);
            }
        } elseif ($media->getClientOriginalExtension() == 'MP4' ||
            $media->getClientOriginalExtension() == 'mp4' ||
            $media->getClientOriginalExtension() == 'avi' ||
            $media->getClientOriginalExtension() == 'MOV' ||
            $media->getClientOriginalExtension() == 'mov') {
            if (!$videoNode) {
                $videoNode = $urlNode->addChild('video:video', '', 'http://www.google.com/schemas/sitemap-video/1.1');
            }
            $videoNode[0]->addChild('video:thumbnail_loc', url('blog/' . $file->path), 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode[0]->addChild('video:title', 'Блог Аренды Высоты', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode[0]->addChild('video:description', 'Наш блог', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode[0]->addChild('video:content_loc', url('blog/' . $file->path), 'http://www.google.com/schemas/sitemap-video/1.1');

            // Remove image node if exists
            if ($imageNode) {
                unset($imageNode[0][0]);
            }
        }

        // Сохранение обновленного sitemap.xml
        $sitemapXml->asXml($sitemapPath);

        return redirect()->route('postsblog.index')->with('success', 'Пост обновлён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Blog::find($id);

        if (!$file) {
            return redirect()->route('postsblog.index')->with('err', 'Пост не найден');
        }

        $path = $file->path;

        // Удаление медиафайла из хранилища
        Storage::disk('blog')->delete($path);

        // Удаление записи из базы данных
        $file->delete();

        // Обновление sitemap
        $sitemapPath = public_path('sitemap.xml');
        $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

        // Удаление соответствующей записи из sitemap
        foreach ($sitemapXml->url as $url) {
            $loc = (string)  $url->loc;

            if (strpos($loc, '/gallery-warehouse/' . $id) !== false) {
                $dom = dom_import_simplexml($url);
                $dom->parentNode->removeChild($dom);
                break;
            }
        }

        // Сохранение обновленного sitemap.xml
        $sitemapXml->asXml($sitemapPath);

        return redirect()->route('postsblog.index')->with('success', 'Пост удален');
    }

}
