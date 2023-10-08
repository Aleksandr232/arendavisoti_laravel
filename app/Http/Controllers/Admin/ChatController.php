<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('admin.chat.index');
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $request->input('message');

        event(new ChatMessageSent($user, $message));

        return response()->json(['success' => true]);
    }
}
