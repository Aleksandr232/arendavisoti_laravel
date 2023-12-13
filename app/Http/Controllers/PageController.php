<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImgTours;
use App\Models\PostScaff;
use App\Models\PostTexnica;
use App\Models\PostTractor;
use App\Models\PriceScaff;
use App\Models\PriceTours;
use App\Models\PriceFile;
use App\Models\Snow;
use App\Models\Warehouse;
use App\Models\Blog;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function towers_tour()
    {
        $pricetours = PriceTours::all();

        return view('site.pages.towers_tour', compact('pricetours'));
    }

    public function scaffolding()
    {
        $pricescaff = PriceScaff::all();
        $pricefile = PriceFile::all();

        return view('site.pages.scaffolding', compact('pricescaff', 'pricefile'));
    }

    public function technics()
    {
        return view('site.pages.technics');
    }

    public function snow_removal()
    {
        return view('site.pages.snow_removal');
    }

    public function gallery()
    {
        $scaff = PostScaff::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);

        return view('site.pages.gallery', compact('scaff', 'tours'));
    }

    public function technics_bars()
    {
        return view('site.pages.technics_bars');
    }

    public function gallery_technics_bars()
    {
        $tractor = PostTractor::query()->paginate(30);
        $tours = PostImgTours::query()->paginate(400);
        $scaff = PostScaff::query()->paginate(400);

        return view('site.pages.gallery_technics_bars', compact('tractor', 'tours', 'scaff'));
    }

    public function gallery_tower()
    {
        $tours = PostImgTours::query()->paginate(400);
        $scaff = PostScaff::query()->paginate(400);

        return view('site.pages.gallery_tower', compact('tours', 'scaff'));
    }

    public function gallery_scaffolding()
    {
        $scaff = PostScaff::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);

        return view('site.pages.gallery_scaffolding', compact('scaff', 'tours'));
    }

    public function gallery_technics()
    {
        $texnica = PostTexnica::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);
        $scaff = PostScaff::query()->paginate(30);

        return view('site.pages.gallery_technics', compact('texnica', 'tours', 'scaff'));
    }

    public function gallery_snow_removal()
    {
        $scaff = PostScaff::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);
        $snow = Snow::query()
        ->orderByDesc('id')
        ->paginate(8);

        return view('site.pages.gallery_snow_removal', compact('scaff', 'tours', 'snow'));
    }

    public function gallery_warehouse()
    {
        $scaff = PostScaff::query()->paginate(400);
        $tours = PostImgTours::query()->paginate(400);
        $warehouse = Warehouse::query()
        ->orderByDesc('id')
        ->paginate(8);

        return view('site.pages.gallery_warehouse', compact('scaff', 'tours', 'warehouse'));
    }

    public function contacts()
    {
        return view('site.pages.contacts');
    }

    public function posts()
    {
        $posts = Post::query()->paginate(400);

        return view('site.pages.posts', compact('posts'));
    }

    public function blog()
    {
        $blog = Blog::query()
        ->orderByDesc('id')
        ->paginate(8);

        return view('site.pages.blog', compact('blog'));
    }

    public function blogid(Request $request, $id)
    {
        $blogid = Blog::query()->find($id);

        return view('site.pages.blog_pages', compact('blogid'));
    }


}
