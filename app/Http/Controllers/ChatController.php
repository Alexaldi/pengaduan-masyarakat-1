<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('includes.chat.index');
    }

    public function getChatHistory($userId, $petugasId)
    {
        $messages = Message::where(function ($query) use ($userId, $petugasId) {
            $query->where('sender_type', User::class)
                  ->where('sender_id', $userId)
                  ->where('receiver_type', Petugas::class)
                  ->where('receiver_id', $petugasId);
        })->orWhere(function ($query) use ($userId, $petugasId) {
            $query->where('sender_type', Petugas::class)
                  ->where('sender_id', $petugasId)
                  ->where('receiver_type', User::class)
                  ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function markAsRead($messageId)
    {
        $message = Message::findOrFail($messageId);

        if (
            (auth()->check() && $message->receiver_type === User::class && $message->receiver_id == auth()->id()) ||
            (auth('petugas')->check() && $message->receiver_type === Petugas::class && $message->receiver_id == auth('petugas')->id())
        ) {
            $message->update(['read' => true]);
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
    }

    public function sendMessageToUser(Request $request, $userId)
    {
        $request->validate(['message' => 'required|string']);
        $user = User::findOrFail($userId);

        $message = Message::create([
            'sender_type' => Petugas::class,
            'sender_id' => auth('petugas')->id(),
            'receiver_type' => User::class,
            'receiver_id' => $user->id,
            'message' => $request->message,
        ]);

        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function sendMessageToPetugas(Request $request, $petugasId)
    {
        $request->validate(['message' => 'required|string']);
        $petugas = Petugas::findOrFail($petugasId);

        $message = Message::create([
            'sender_type' => User::class,
            'sender_id' => auth()->id(),
            'receiver_type' => Petugas::class,
            'receiver_id' => $petugas->id,
            'message' => $request->message,
        ]);

        return response()->json(['status' => 'success', 'message' => $message]);
    }
}
