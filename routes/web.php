<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GetConversations;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $controller = new GetConversations();
    $conversations = $controller->getConversations();
    $data = $conversations->getData();
    return view('landing', ['conversations' => $data]);
});

Route::get('/chat/{name}', function ($name) {
    $controller = new ChatController();
    $messages = $controller->getMessages($name);
    $data = $messages->getData();
    return view('chat', ['messages' => $data, 'name' => $name]);
});
