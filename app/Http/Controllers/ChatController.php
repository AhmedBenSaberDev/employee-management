<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Models\ChatMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function home()
    {
        
        $currentDateTime = Carbon::now();
        $newDateTime = Carbon::now()->subDays(4);

        $users = User::all();
        $messages = ChatMessage::all();

        return view('backend.chat.room',compact('users','messages'));
    }

    public function store(Request $request)
    {
        event(new ChatMessageEvent(auth()->user()->name,$request->message));

        $message = new ChatMessage();
        $message->sender = auth()->user()->name;
        $message->content = $request->message;
        $message->save();

        return response()->json([
            'success' => 'chat message send'
        ]);
    }
}
