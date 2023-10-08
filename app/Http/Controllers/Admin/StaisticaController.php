<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Post;
use App\Models\PostImgTours;
use App\Models\PostScaff;
use App\Models\PostTexnica;
use App\Models\PostTractor;
use App\Models\Order;

class StaisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all('id');
        $tours = PostImgTours::all('id');
        $post = Post::all('id');
        $scaff = PostScaff::all('id');
        $texnica = PostTexnica::all('id');
        $tractor = PostTractor::all('id');
        $orders = Order::all('id');
        return response()->json([['statistica'=>$contact], ['statistica'=>$tours], ['statistica'=>$post], ['statistica'=>$scaff], ['statistica'=>$texnica], ['statistica'=>$tractor],['statistica'=>$orders] ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->company = $request->company;
        $contact-> address = $request->address;
        $contact->save();
        return response()->json(['message' => 'Contact created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
