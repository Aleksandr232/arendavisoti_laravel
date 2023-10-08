<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class PostTgController extends Controller
{
    public function sendTg(Request $request)
    {


        $token = '6142156420:AAFyNk8lI1UZgt8sijO8GC73tDXdLunPLWY';
        $phones = $request->input('phones');
        $messages = $request->input('messages');
        $file = $request->file('file');



        $response = $request->hasFile('file') ?
    Http::attach('document', file_get_contents($request->file('file')), $request->file('file')->getClientOriginalName())
        ->post("https://api.telegram.org/bot{$token}/sendDocument", [
            'chat_id' => $phones,
            'caption' => $messages,
        ]) :
    Http::asForm()->post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $phones,
            'text' => $messages,
        ]);





        if ($response->ok()) {
             return redirect()->route('posttg.create')->with('success', 'Письмо отправлено в телеграмм');
        } else {
            return redirect()->route('posttg.create')->with('err', 'Ошибка отправки');
        }


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.sedingtg.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::all();

        return view('admin.sedingtg.create', compact('contact'));
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
