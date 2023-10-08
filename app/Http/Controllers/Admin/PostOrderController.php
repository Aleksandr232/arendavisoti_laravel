<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PostOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all('id');


        return response()->json([['order'=>$orders]]);
    }

    public function store(Request $request)
    {
        $orders = new Order;
        $orders->phone = $request->input('phone');
        $orders->name = $request->input('name');
        $orders->order = $request->input('order');
        $orders->save();

        return response()->json(['message' => 'Order created successfully'], 201);
    }
}
