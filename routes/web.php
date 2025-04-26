<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GetConversations;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    // Handle the authenticated user
    // For example, you can store the user in the session or database
    // log the user information
    Log::info('User authenticated', ['user' => $user]);
    return redirect('/signup')->with('user', $user);
});

Route::get('/signup', function () {
    $user = session('user');
    if (!$user) {
        return redirect('/auth/redirect');
    }
    return view('signup', ['user' => $user]);
});
