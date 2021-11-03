<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function view()
    {
        $employees = Employee::all();

        return view('backend.setup.employee.view',compact('employees'));
    }

    public function add()
    {
        $departements = Departement::all();

        return view('backend.setup.employee.add',compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email|unique:employees,email",
            'phone' => "required|integer",
            'departement_id' => "required|integer",
            'salary' => "required|integer",
            'age' => "required|integer"
        ]);

        $employee = new Employee();
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->departement_id = $request->departement_id;
        $employee->salary = $request->salary;
        $employee->phone = $request->phone;
        $employee->age = $request->age;
        $employee->save();

        $notification = array(
            "message" => "Employee has been added successfuly",
            "alert-type" => "success"
        );

        return redirect()->route('employee.view')->with($notification);
    }
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        $notification = array(
            "message" => "Employee has been removed successfuly",
            "alert-type" => "success"
        );

        return redirect()->route('employee.view')->with($notification);
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departements = Departement::all();
        
        return view('backend.setup.employee.edit',compact('employee','departements'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email|unique:employees,email,".$id,
            'phone' => "required|integer",
            'departement_id' => "required|integer",
            'salary' => "required|integer",
            'age' => "required|integer"
        ]);

        $employee = Employee::findOrFail($id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->departement_id = $request->departement_id;
        $employee->age = $request->age;
        $employee->salary = $request->salary;

        $employee->save();

        $notification = array(
            "message" => "Employee has been successfuly updated",
            "alert-type" => "success"
        );

        return redirect()->route('employee.view')->with($notification);
    }

}
