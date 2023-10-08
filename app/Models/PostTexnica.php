<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostTexnica extends Model
{
    use HasFactory;

    protected $fillable = [ 'img', 'text_img'];
    protected $table = 'texnica';

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('img')) {
            if ($image) Storage::delete($image);

            $folder = date('Y-m-d');

            $imagePath = $request->file('img')->store("images/{$folder}");

            // Updating sitemap.xml
            $siteMapPath = public_path('sitemap.xml');
            $siteMapXml = new \SimpleXMLElement(file_get_contents($siteMapPath));

            // Установка пространства имён для элементов image
            $siteMapXml->registerXPathNamespace('image', 'http://www.google.com/schemas/sitemap-image/1.1');

            // Создание новой записи в sitemap для загруженной картинки
            $urlNode = $siteMapXml->addChild('url');
            $urlNode->addChild('loc', url('https://арендавысоты.рф/галерея-техника'));
            $urlNode->addChild('lastmod', '2023-07-16T01:09:31+00:00');
            $urlNode->addChild('changefreq', 'daily');
            $urlNode->addChild('priority', '0.8');


            $imageNode = $urlNode->addChild('image:image', '','http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:loc', url('uploads/' . $imagePath), 'http://www.google.com/schemas/sitemap-image/1.1');
            $imageNode->addChild('image:title', 'грузоперевозки', 'http://www.google.com/schemas/sitemap-image/1.1');

            // Saving the updated sitemap.xml
            $siteMapXml->asXml($siteMapPath);

            return $imagePath;
        }

        return null;
    }
}
