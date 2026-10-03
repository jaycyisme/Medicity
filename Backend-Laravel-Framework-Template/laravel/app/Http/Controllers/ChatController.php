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
    public function doctorChats()
    {
        $doctor = Auth::user();

        if (!$doctor) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Lấy danh sách User mà Doctor đã nhắn tin
        $userIds = Chat::where('sender_id', $doctor->id)
            ->orWhere('receiver_id', $doctor->id)
            ->pluck('sender_id', 'receiver_id')
            ->toArray();

        $userIds = array_unique(array_merge(array_keys($userIds), array_values($userIds)));

        // Lọc danh sách User không phải Doctor (Chỉ lấy User bình thường)
        $users = User::whereIn('id', $userIds)
            ->where('id', '!=', $doctor->id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'doctor'); // Lọc ra các user không phải Doctor
            })
            ->get();

        $selectedUser = null;

        return view('chatzy.admin.doctor-chat', [
            'LoggedDoctorInfo' => $doctor,
            'users' => $users,
            'selectedUser' => $selectedUser
        ]);
    }

    public function chatWithUser($userId)
    {
        $doctor = Auth::user();

        if (!$doctor) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        $user = User::findOrFail($userId);

        // Lấy danh sách User đã từng nhắn tin với Doctor
        $userIds = Chat::where('sender_id', $doctor->id)
            ->orWhere('receiver_id', $doctor->id)
            ->pluck('sender_id', 'receiver_id')
            ->toArray();

        $userIds = array_unique(array_merge(array_keys($userIds), array_values($userIds)));

        // Nếu User chưa từng nhắn tin, thêm User vào danh sách
        if (!in_array($userId, $userIds)) {
            $userIds[] = $userId;
        }

        // Lấy danh sách User, lọc bỏ Doctor
        $users = User::whereIn('id', $userIds)
            ->where('id', '!=', $doctor->id)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'doctor'); // Chỉ lấy User, không lấy Doctor
            })
            ->get();

        // Lấy tin nhắn giữa Doctor và User được chọn
        $chats = Chat::where(function ($query) use ($doctor, $user) {
            $query->where('sender_id', $doctor->id)->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($doctor, $user) {
            $query->where('sender_id', $user->id)->where('receiver_id', $doctor->id);
        })->orderBy('created_at', 'asc')->get();

        return view('chatzy.admin.doctor-chat', [
            'LoggedDoctorInfo' => $doctor,
            'users' => $users,
            'selectedUser' => $user,
            'chats' => $chats
        ]);
    }

    public function userChats()
    {
        $user = Auth::user(); // Lấy user hiện tại

        if (!$user) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Lấy danh sách doctor đã nhắn tin với user hiện tại
        $doctorIds = Chat::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->pluck('sender_id', 'receiver_id')
            ->toArray();

        $doctorIds = array_unique(array_merge(array_keys($doctorIds), array_values($doctorIds))); // Lấy danh sách userId không trùng lặp

        // Chỉ lấy những user có role là "doctor"
        $doctors = User::whereIn('id', $doctorIds)
            ->where('id', '!=', $user->id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'doctor'); // Lọc theo vai trò "doctor" trong Spatie
            })
            ->get();

        // Lấy danh sách tin nhắn liên quan đến user
        $chats = Chat::with(['senderProfilee', 'receiverProfilee'])
            ->where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->get();

        // Lọc danh sách doctor đã nhắn tin với user
        $allChats = $chats->map(function ($chat) use ($user) {
            if ($chat->sender_id == $user->id) {
                $chat->user_id = $chat->receiver_id;
                $chat->profile = $chat->receiverProfilee ?: $chat->receiverSellerProfile;
            } else {
                $chat->user_id = $chat->sender_id;
                $chat->profile = $chat->senderProfilee ?: $chat->senderSellerProfile;
            }
            return $chat;
        })->unique('user_id')->values();

        $selectedDoctor = null;

        return view('chatzy.admin.user-chat', [
            'LoggedUserInfo' => $user,
            'chats' => $allChats,
            'users' => $doctors, // Chỉ lấy danh sách các bác sĩ user đã nhắn tin
            'selectedDoctor' => $selectedDoctor,
        ]);
    }

    public function chatWithDoctor($doctorId)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('fail', 'You must be logged in to access the dashboard');
        }

        // Tìm bác sĩ theo ID
        $doctor = User::findOrFail($doctorId);

        // Lấy danh sách bác sĩ đã nhắn tin với user
        $doctorIds = Chat::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->pluck('sender_id', 'receiver_id')
            ->toArray();

        $doctorIds = array_unique(array_merge(array_keys($doctorIds), array_values($doctorIds)));

        // **Nếu bác sĩ chưa từng nhắn tin, thêm bác sĩ vào danh sách**
        if (!in_array($doctorId, $doctorIds)) {
            $doctorIds[] = $doctorId;
        }

        // Lấy danh sách bác sĩ từ Spatie
        $users = User::whereIn('id', $doctorIds)
            ->where('id', '!=', $user->id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'doctor');
            })
            ->get();

        // Lấy tin nhắn giữa user và doctor
        $chats = Chat::where(function ($query) use ($user, $doctor) {
            $query->where('sender_id', $user->id)->where('receiver_id', $doctor->id);
        })->orWhere(function ($query) use ($user, $doctor) {
            $query->where('sender_id', $doctor->id)->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return view('chatzy.admin.user-chat', [
            'LoggedUserInfo' => $user,
            'chats' => $chats,
            'selectedDoctor' => $doctor, // Chọn bác sĩ ngay từ đầu
            'users' => $users,
        ]);
    }

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
