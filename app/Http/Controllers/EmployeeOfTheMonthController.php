<?php

namespace App\Http\Controllers;

use App\Models\EmployeeOfTheMonth;
use Illuminate\Http\Request;

class EmployeeOfTheMonthController extends Controller
{
    public function add()
    {
        return view('backend.setup.employee_of_the_month.add');
    }

    public function store(Request $request)
    {
        $request->validate(["name" => "required"]);

        $employee = new EmployeeOfTheMonth();
        $employee->name = $request->name;

        $employee->save();

        $notification = array(
            "message" => "Employee Of The Month Updated successfully",
            "alert-type" => "success"
        );

        return redirect()->route('user.index')->with($notification);
    }

}
