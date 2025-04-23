<?php

use App\Http\Controllers\GetConversations;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $controller = new GetConversations();
    return view('chat', ['entries' => $controller->getConversations()]);
});
