<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostImgTours;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
            'media' => 'required'],
            ['media.required' => 'Загрузите фото или видео',
            'media.file' => 'Загруженный файл должен быть фото или видео',
            'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV'
            ]);

        if($request -> hasFile('media')){
            $media = $request->file('media');
            $path = Storage::disk('public')->putFile('tours', $media);

            $file = new PostImgTours;
            $file->media = $media->getClientOriginalExtension();
            $file->title = $request->input('title');
            $file->content = $request->input('content');
            $file->height = $request->input('height');
            $file->path = $path;

            // Конвертирование изображения в формат WebP и сохранение только в этом формате
            if (in_array($media->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                $image = Image::make($media)->encode('webp', 75);
                $webpFilename = $media->hashName() . '.webp';
                $webpPath = 'tours/' . $webpFilename;
                Storage::disk('public')->put($webpPath, $image);

                $file->path = $webpPath;



                // Удаление оригинального файла
                Storage::disk('public')->delete($path);
            }

            // Проверка количества загружаемых видео
            $videoCount = PostImgTours::where('media', 'LIKE', '%mp4')
                                ->orWhere('media','LIKE','%avi')
                                ->orWhere('media','LIKE','%mov')
                                ->orWhere('media','LIKE','%MP4')
                                ->count();
            $maxVideoCount = 5; // Максимальное количество видео

            if ($media->getClientOriginalExtension() == 'mp4' ||$media->getClientOriginalExtension() == 'MP4' ||  $media->getClientOriginalExtension() == 'avi' || $media->getClientOriginalExtension() == 'mov') {
                if ($videoCount >= $maxVideoCount) {

                    Storage::disk('public')->delete($path);

                    return redirect()->route('postsimgtours.index')->with('err', 'Превышено максимальное количество видео. Удалите старые видео для загрузки нового.');
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
            $urlNode->addChild('loc', url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D0%B2%D1%8B%D1%88%D0%B5%D0%BA-%D1%82%D1%83%D1%80'));
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
                $imageNode->addChild('image:title', $file->title  .  $file->content , 'http://www.google.com/schemas/sitemap-image/1.1');
            } else if ($media->getClientOriginalExtension() == 'MP4' ||
            $media->getClientOriginalExtension() == 'mp4' ||
            $media->getClientOriginalExtension() == 'avi' ||
            $media->getClientOriginalExtension() == 'mov') {
            $videoNode = $urlNode->addChild('video:video', '', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:thumbnail_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:title', $file->title  .  $file->content , 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:description', 'аренда вышек-тур казань', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:content_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            }

            $sitemapXml->asXml($sitemapPath);

        return redirect()->route('postsimgtours.index')->with('success', 'Медиа файл  добавлена');
    }

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
    public function destroy($id)
    {
        $tours = PostImgTours::find($id);

        if($tours) {
            Storage::disk('public')->delete($tours->path);

            $tours->delete();

            return redirect()->route('postsimgtours.index')->with('success', 'Медиа файл удален');
        } else {
            return redirect()->route('postsimgtours.index')->with('err', 'Запись не найдена');
        }
    }
}
