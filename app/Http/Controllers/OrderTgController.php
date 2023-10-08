<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Contact;
use App\Models\Order;
use App\Notifications\SendOrderTelegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderTgController extends Controller

{

    public function sendOrder(Request $request)
    {

        $orders = new Order();
        $orders -> phone = $phone = $request->input('phone');
        $orders -> name = $name = $request->input('name');
        $orders -> order = $order  = $request->input('order');
        $orders -> save();
        $token = '5712282898:AAFrkaHw7Y-KDAPm1z6LBGj5lgG8YM6L_Uc';
        $id = '-1001709775142';



        $this->validate($request, [
            'order' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ],
        [
            'order.required' => 'Укажите услугу',
            'name.required' => 'Укажите имя',
            'phone.required' => 'Укажите номер телефона'
        ]);



        $response = Http::asForm()->post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $id,
            'text' =>  "Новая заявка на $order от $name с номером телефона $phone"

        ]);

        return view('site.mail.sendOrder', ['order' => $order, 'name'=>$name]);
    }
}
