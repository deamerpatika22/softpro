<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Conversation;

class DialogflowWebhookController extends Controller
{
    /**
     * Handle the webhook request from Dialogflow.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleWebhook(Request $request)
{
    $data = $request->all();
    $userMessage = $data['queryResult']['queryText'] ?? 'Tidak ada pesan';
    $botResponse = $data['queryResult']['fulfillmentText'] ?? 'Tidak ada respons';
    $sessionId = $data['session'];

    // Simpan percakapan ke database
    Conversation::create([
        'session_id' => $sessionId,
        'user_message' => $userMessage,
        'bot_response' => $botResponse,
    ]);

    // Kembalikan respons ke Dialogflow
    return response()->json([
        'fulfillmentText' => $botResponse,
    ]);
    return response()->json(['message' => 'Webhook received successfully'], 200);

}
}
