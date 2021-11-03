<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function view()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        return view('backend.profile.view',compact('user'));
    }

    public function edit()
    {
        $userId = Auth::user()->id;

        $user = User::findOrFail($userId);

        return view('backend.profile.edit',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            "email" => 'required|email|unique:users,email,'.Auth::user()->id,
            "name" => "required",
        ]);

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;

        

        if(!empty($request->file('image'))){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('upload/user_images/'), $imageName);

            $user->image = $imageName;
        };

        $user->save();

        $notification = array(
            "message" => "Profile updated successfully",
            "alert-type" => "success"
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function viewPassword()
    {
        return view('backend.profile.password_edit');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed',
    	]);


    	$hashedPassword = Auth::user()->password;

    	if (Hash::check($request->oldpassword,$hashedPassword)) {
            
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login');
    	}else{
    		return redirect()->back();
    	}
    }
}
