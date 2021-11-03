<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function view()
    {
        $departements = Departement::all();
        return view('backend.setup.departement.view',compact('departements'));
    }

    public function add()
    {
        return view('backend.setup.departement.add');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:departements"
        ]);

        $departement = new Departement();

        $departement->name = $request->name;
        $departement->save();

        $notification = array(
            "message" => "Departement has been added successfuly",
            "alert-type" => "success"
        );

        return redirect()->route('departement.view')->with($notification);
    }

    public function delete($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();

        $notification = array(
            "message" => "Departement has been removed successfuly",
            "alert-type" => "success"
        );

        return redirect()->route('departement.view')->with($notification);
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        
        return view('backend.setup.departement.edit',compact('departement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|unique:departements,name,".$id
        ]);

        $departement = Departement::findOrFail($id);
        $departement->name = $request->name;

        $departement->save();

        $notification = array(
            "message" => "Departement has been successfuly updated",
            "alert-type" => "success"
        );

        return redirect()->route('departement.view')->with($notification);
    }

}
