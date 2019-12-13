<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\MessageCreated;

class ChatController extends Controller
{
    public function index()
    {
        return \App\Message::orderBy('id', 'desc')->get();
    }

    public function create(Request $request)
    {
        $message = \App\Message::create([
            'body' => $request->message
        ]);
        event(new MessageCreated($message));
    }
}
