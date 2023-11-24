<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostScaff;
use App\Models\PostImgTours;
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


    public function photo(){
    $scaffs = PostScaff::orderBy('id', 'desc')->take(10)->get();
    $tours = PostImgTours::orderBy('id', 'desc')->take(10)->get();

    $lesaPhotos = [] ;
    $toursPhotos = [];

    foreach ($scaffs as $scaff) {
        $lesaPhotos[] = "https://xn--80aagge2ckkol0hd.xn--p1ai/uploads/" . $scaff->img;
    }

    foreach ($tours as $tour) {
        $toursPhotos[] = "https://xn--80aagge2ckkol0hd.xn--p1ai/uploads/" . $tour->img;
    }

    $photos = [
        'lesa' => $lesaPhotos,
        'tours' => $toursPhotos
    ];

        return response()->json(['photo' => $photos], 200);
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
            'media' => 'required'],
            ['media.required' => 'Загрузите фото или видео',
            'media.file' => 'Загруженный файл должен быть фото или видео',
            'media.mimes' => 'Допустимые форматы файлов: JPEG, PNG, MP4, AVI, MOV'
            ]);

        if($request -> hasFile('media')){
            $media = $request->file('media');
            $path = Storage::disk('public')->putFile('lesa', $media);

            $file = new PostScaff;
            $file->media = $media->getClientOriginalExtension();
            $file->square = $request->input('square');
            $file->appointment = $request->input('appointment');
            $file->objects = $request->input('objects');
            $file->path = $path;
            $file->save();

            // Генерация sitemap
            $sitemapPath = public_path('sitemap.xml');
            $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

            // Установка пространства имён для элементов image и video
            $sitemapXml->registerXPathNamespace('image', 'http://www.google.com/schemas/sitemap-image/1.1');
            $sitemapXml->registerXPathNamespace('video', 'http://www.google.com/schemas/sitemap-video/1.1');

            // Создание новой записи в sitemap для загруженного медиафайла
            $urlNode = $sitemapXml->addChild('url');
            $urlNode->addChild('loc', url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D1%81%D1%82%D1%80%D0%BE%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D1%85-%D0%BB%D0%B5%D1%81%D0%BE%D0%B2'));
            $urlNode->addChild('lastmod', date('Y-m-d\TH:i:sP'));
            $urlNode->addChild('changefreq', 'daily');
            $urlNode->addChild('priority', '0.8');

            // Если файл является изображением
            if($media->getClientOriginalExtension() == 'jpg' ||
                $media->getClientOriginalExtension() == 'jpeg' ||
                $media->getClientOriginalExtension() == 'png') {
                $imageNode = $urlNode->addChild('image:image', '', 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageNode->addChild('image:loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageNode->addChild('image:title', $file->appointment  .  $file->objects , 'http://www.google.com/schemas/sitemap-image/1.1');
            } else if ($media->getClientOriginalExtension() == 'MP4' ||
            $media->getClientOriginalExtension() == 'mp4' ||
            $media->getClientOriginalExtension() == 'avi' ||
            $media->getClientOriginalExtension() == 'mov') {
            $videoNode = $urlNode->addChild('video:video', '', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:thumbnail_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:title', $file->appointment  .  $file->objects , 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:description', 'Наш блог', 'http://www.google.com/schemas/sitemap-video/1.1');
            $videoNode->addChild('video:content_loc', url('uploads/' . $path), 'http://www.google.com/schemas/sitemap-video/1.1');
            }

            // Сохранение обновленного sitemap.xml
            $sitemapXml->asXml($sitemapPath);
        }


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
        $scaff = PostScaff::find($id);

        if($scaff) {
            $scaff->delete();
            return redirect()->route('postscaff.index')->with('success', 'Изображение лесов удалено');
        } else {
            return redirect()->route('postscaff.index')->with('error', 'Запись не найдена');
        }
    }
}
