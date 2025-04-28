<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GetConversations;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    Log::error('URL Debug', [
        'raw_app_url' => env('APP_URL'),
        'config_app_url' => config('app.url'),
        'request_url' => request()->getSchemeAndHttpHost(),
        'request_full_url' => request()->fullUrl(),
        'is_secure' => request()->secure(),
    ]);

    $controller = new GetConversations();
    $conversations = $controller->getConversations();
    $data = $conversations->getData();
    return view('landing', ['conversations' => $data]);
});

Route::get('/chat/{name}', function ($name) {
    $controller = new ChatController();
    $messages = $controller->getMessages($name);
    $data = $messages->getData();

    return view('chat', ['messages' => $data, 'name' => $name, 'user' => Auth::user()]);
})->middleware('auth');

Route::get('/auth/redirect', function () {
    if (request()->has('intended')) {
        session(['url.intended' => request()->get('intended')]);
    }
    return Socialite::driver('github')
        ->with(['redirect_uri' => 'https://dev-shuflduf-laravel-chat.vercel.app/auth/callback'])
        ->redirect();
})->name('login');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    Log::info('GitHub User: ', (array) $githubUser);

    $user = User::updateOrCreate(
        ['email' => $githubUser->email],
        [
            'name' => $githubUser->name ?? $githubUser->nickname,
            'email' => $githubUser->email,
        ]
    );

    Auth::login($user, true);
    return redirect(session()->pull('url.intended', '/'));
});

Route::post("/messages", [ChatController::class, 'newMessage'])->middleware('auth')->name("messages.store");



