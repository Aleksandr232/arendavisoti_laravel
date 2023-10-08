<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Snow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SnowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snow = Snow::query()
        ->orderByDesc('id')
        ->paginate(10);

        return view('admin.snowimg.index', compact('snow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.snowimg.create');
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
            'img' => 'required|image',
        ],
        [
            'img.required' => 'Загрузите фотографию сотрудника',
            'img.image' => 'Загруженный файл должен быть изображением',
        ]);

        if($request -> hasFile('img')){
            $img = $request->file('img');
            $path = Storage::disk('snow')->putFile('snowimg', $img);

            $file = new Snow;
            $file->img = $img->getClientOriginalName();
            $file->path = $path;
            $file->save();

            // Generate sitemap
            $sitemapPath = public_path('sitemap.xml');
            $sitemapXml = new \SimpleXMLElement(file_get_contents($sitemapPath));

            // Установка пространства имён для элементов image
            $sitemapXml->registerXPathNamespace('image', 'http://www.google.com/schemas/sitemap-image/1.1');

            // Создание новой записи в sitemap для загруженной картинки
            $urlNode = $sitemapXml->addChild('url');
            $urlNode->addChild('loc', url('https://xn--80aagge2ckkol0hd.xn--p1ai/%D0%B3%D0%B0%D0%BB%D0%B5%D1%80%D0%B5%D1%8F-%D1%83%D0%B1%D0%BE%D1%80%D0%BA%D0%B0-%D1%81%D0%BD%D0%B5%D0%B3%D0%B0'));
            $urlNode->addChild('lastmod', date('Y-m-d\TH:i:sP'));
            $urlNode->addChild('changefreq', 'daily');
            $urlNode->addChild('priority', '0.8');

            $imageNode = $urlNode->addChild('image:image', '', 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:loc', url('snow/' . $path), 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:title', 'уборка снега с крыш', 'http://www.google.com/schemas/sitemap-image/1.1');

            // Saving the updated sitemap.xml
            $sitemapXml->asXml($sitemapPath);
        }

        return redirect()->route('postssnow.index')->with('success', 'Фото добавлено и sitemap сгенерирован');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snow  $snow
     * @return \Illuminate\Http\Response
     */
    public function show(Snow $snow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Snow  $snow
     * @return \Illuminate\Http\Response
     */
    public function edit(Snow $snow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snow  $snow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snow $snow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snow  $snow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snow $snow)
    {
        //
    }
}
