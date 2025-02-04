<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function chats()
    {
        $doctor = User::find(Auth::user()->id);
        $users = User::where('id', '!=', Auth::user()->id)->get();
        if (!$doctor) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Fetch chats where the admin is either the sender or the receiver
        $chats = Chat::with(['senderProfilee', 'receiverProfilee'])
            ->where('sender_id', $doctor->id)
            ->orWhere('receiver_id', $doctor->id)
            ->get();


        // Combine both results and remove duplicates
        $allChats = $chats->map(function($chat) use ($doctor) {
            if ($chat->sender_id == $doctor->id) {
                if ($chat->receiverProfilee) {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverProfilee;
                } else {
                    $chat->user_id = $chat->receiver_id;
                    $chat->profile = $chat->receiverSellerProfile;
                }
            } else {
                if ($chat->senderProfilee) {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderProfilee;
                } else {
                    $chat->user_id = $chat->sender_id;
                    $chat->profile = $chat->senderSellerProfile;
                }
            }
            return $chat;
        })->unique('user_id')->values();

        // Pass the logged-in admin's information and chats to the view
        return view('chatzy.admin.chats', [
            'LoggedAdminInfo' => $doctor,
            'chats' => $allChats,
            'users' => $users,
        ]);
    }
}
