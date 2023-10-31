<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.chat.index', compact('messages') );
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message->content = $request->input('content');
        $message->author = $user->name;
        $message->save();


        return redirect()->route('chat.index')->with('success', 'Сообщение отправлено');
    }
}
