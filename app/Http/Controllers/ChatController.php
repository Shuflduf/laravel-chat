<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function getMessages(String $name): JsonResponse
    {
        $conversation_id = DB::table('conversations')
            ->where('name', '=', $name)
            ->first()
            ->id;

        $messages = DB::table('messages')
            ->where('conversation_id', '=', $conversation_id)
            ->get()
            ->toArray();

        return response()->json($messages);
    }
}
