<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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

    public function newMessage()
    {
        $data = request()->validate([
            'message' => 'required|string',
            'conversation_id' => 'required|integer',
        ]);
        Log::info('New Message Data: ', $data);
        Log::alert('New Message Data: ', $data);

        $conversation = Conversation::findOrFail($data['conversation_id']);

        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'content' => $data['message'],
        ]);

        return redirect()->back();
    }
}
