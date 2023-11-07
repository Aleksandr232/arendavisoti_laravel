<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImgTours;
use App\Models\PostScaff;
use App\Models\PostTexnica;
use App\Models\PostTractor;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Logistatus;
use App\Models\Snow;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $tours = PostImgTours::all();
        $scaff = PostScaff::all();
        $texnica = PostTexnica::all();
        $tractor = PostTractor::all();
        $contact = Contact::all();
        $logist = Logistatus::all();
        $snow = Snow::all();
        $warehouse = Warehouse::all();


        return view('admin.home.index', compact('posts' ,'tours', 'scaff', 'texnica', 'tractor', 'contact', 'logist', 'snow', 'warehouse' ));

    }








}
