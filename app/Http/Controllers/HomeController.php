<?php

namespace App\Http\Controllers;

use App\Models\EmployeeOfTheMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype == "Admin")
        {
            $employee =  EmployeeOfTheMonth::latest()->first();

            return view('admin.index',compact('employee'));
        }
        if(Auth::user()->usertype == "User")
        {
            $employee =  EmployeeOfTheMonth::latest()->first();

            return view('user.index',compact('employee'));
        }
    }
}
