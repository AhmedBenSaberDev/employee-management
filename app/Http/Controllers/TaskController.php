<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\taskMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function add()
    {
        $users = User::all();

        return view('backend.setup.task.add',compact('users'));
    }

    public function sendNotification(Request $request)
    {
        $notification = array(
            "message" => "Notification sent successfully",
            "alert-type" => "success"
        );

        if($request->user_id == "all")
        {
            $users = User::all();

            foreach($users as $user){
                if(Auth::user()->id != $user->id)
                {
                    $content = $request->content;
                    $user->notify(new taskMessage(Auth::user()->name,Auth::user()->image,$content));
                }  
            }

            return redirect()->route('user.index')->with($notification);

        }else{

            $user = User::findOrFail($request->user_id);
            $content = $request->content;
            $user->notify(new taskMessage(Auth::user()->name,Auth::user()->image,$content));         
            return redirect()->route('user.index')->with($notification);
        }
        
        

    }

    public function clearNotifications()
    {

        foreach( auth()->user()->notifications as $notification)
        {
            $notification->markAsRead();
        }

        $notification = array(
            "message" => "Notifications cleared successfully",
            "alert-type" => "success"
        );

       
        return redirect()->route("task.view")->with($notification);
    }

    public function showNotifications()
    {
        return view('backend.setup.task.view');
    }

    public function readNotification($notification)
    {
        foreach (Auth::user()->unreadNotifications as  $notif) {
            if($notif->id == $notification){
                $notif->markAsRead();
            }
        }
        
        return redirect()->route('task.view');
    }
}
