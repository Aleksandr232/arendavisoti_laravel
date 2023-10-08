<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceTours;
use Illuminate\Http\Request;

class PostPriceToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricetours = PriceTours::all();

        return view('admin.postpricetours.index', compact('pricetours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postpricetours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function show(PriceTours $priceTours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceTours $priceTours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceTours $priceTours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceTours  $priceTours
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceTours $priceTours)
    {
        //
    }
}
