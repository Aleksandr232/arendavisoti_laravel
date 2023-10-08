<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GreenApi\RestApi\GreenApiClient;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;

class PostWatsaapController extends Controller
{
    public function sendWat(Request $request)
    {
        $idInstance = '1101819093';
        $apiTokenInstance ='50f056e043344dad929b2ee9d61d011cf40c530779fd42a1ba';

        $greenApi = new GreenApiClient( $idInstance , $apiTokenInstance );

        $phones = $request->input('phones');
        $phonesArr = explode(',', $phones);
        $messages = $request->input('messages');
        $file = $request->file('file');
        $result = false;

        if ($file) {
            foreach($phonesArr as $phone) {
                $result = $greenApi->sending->sendFileByUpload("$phone@c.us", $file, $messages);
            }
        } else {
            foreach($phonesArr as $phone) {
                $result = $greenApi->sending->sendMessage("$phone@c.us", $messages);
            }
        }

        if ($result) {
            return redirect()->route('postswats.create')->with('success', 'Сообщение и файл успешно отправлены в WhatsApp');
        } else {
            return redirect()->route('postswats.create')->with('err', 'Ошибка при отправке сообщения и файла в WhatsApp');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::all();

        return view('admin.sendwatsapp.create', compact('contact'));
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
