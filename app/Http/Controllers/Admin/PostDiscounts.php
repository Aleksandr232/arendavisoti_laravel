<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostDiscount;
use Illuminate\Http\Request;

class PostDiscounts extends Controller
{
    public function index()
    {
        $dis = PostDiscount::all("discounts");

        return view('admin.discounts.index', compact('dis'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'discounts' => 'required'
        ]);

        $discounts = PostDiscount::updateOrCreate(
            [],
            ['discounts' => $request->input('discounts')]
        );

        return redirect()->route('postsdiscounts.index')->with('success', 'Скидка обновлена');
    }

}

