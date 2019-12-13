<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return \App\Message::orderBy('id', 'desc')->get();
    }

    public function create(Request $request)
    {
        \App\Message::create([
            'body' => $request->message
        ]);
    }
}
