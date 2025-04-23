<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_decode;

class GetConversations extends Controller
{
    public function getConversations(): JsonResponse
    {
        $conversations = DB::table('conversations')
            ->get()
            ->toArray();

        return response()->json($conversations);
    }
}
