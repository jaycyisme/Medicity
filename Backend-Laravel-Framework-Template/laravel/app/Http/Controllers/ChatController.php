<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Events\SendUserMessage;
use App\Events\SendAdminMessage;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|integer|exists:users,id', // Ensure the receiver_id is a valid user id
        ]);

        $LoggedAdminInfo = User::find(Auth::user()->id);
        if (!$LoggedAdminInfo) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to send a message',
            ]);
        }

        $message = new Chat();
        $message->sender_id = $LoggedAdminInfo->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();
        broadcast(new SendAdminMessage($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
        ]);
    }
    public function fetchMessages(Request $request)
    {
        $receiverId = $request->input('receiver_id');

        // Fetch the logged-in admin using the session
        $adminId = Auth::id();
        $LoggedAdminInfo = User::find($adminId);

        if (!$LoggedAdminInfo) {
            return response()->json([
                'error' => 'Admin not found. You must be logged in to access messages.'
            ], 404);
        }

        // Fetch messages between the admin and the specified seller
        $messages = Chat::where(function ($query) use ($adminId, $receiverId) {
            $query->where('sender_id', $adminId)->where('receiver_id', $receiverId)
                  ->orWhere(function ($query) use ($adminId, $receiverId) {
                      $query->where('sender_id', $receiverId)->where('receiver_id', $adminId);
                  });
        })->orderBy('created_at', 'asc')->get();


        return response()->json([
            'messages' => $messages
        ]);
    }
}
