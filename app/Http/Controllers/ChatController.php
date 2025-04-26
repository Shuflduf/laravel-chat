<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    public function getMessages(String $name): JsonResponse
    {
        $conversation = Conversation::where('name', $name)
            ->firstOrFail();

        $messages = $conversation->messages()
            ->with('user')
            ->get();

        return response()->json($messages);
    }
}
