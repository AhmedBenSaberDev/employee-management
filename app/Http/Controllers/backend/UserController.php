<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;



class UserController extends Controller
{

    public function view()
    {
        $users = User::all();
        return view('backend.user.view',compact('users'));
    }

    public function add ()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => 'email|required|unique:users',
            "name" => "required",
            "usertype" => "required",
            "password" => "required|min:8"
        ]);

        $userModel = new User();

        $userModel->usertype = $request->usertype;
        $userModel->name = $request->name;
        $userModel->email = $request->email;
        $userModel->password =  bcrypt($request->password);

        $userModel->save();

        $notification = array(
            "message" => "User Inserted Successfully",
            "alert-type" => "success"
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("backend.user.edit",compact("user"));
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            "email" => "required|email|unique:users,email," .$id,
            "name" => "required",
            "usertype" => "required"
        ]);

        $user = User::findOrFail($id);

        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $notification = array(
            "message" => "User has been successfuly updated",
            "alert-type" => "success"
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        $notification = array(
            "message" => "User has been successfuly deleted",
            "alert-type" => "success"
        );

        return redirect()->route('user.view')->with($notification);
    }

}
