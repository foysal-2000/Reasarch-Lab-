<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    public function index()
    {
        $roles = User::all();
        return view("backend.role.index", compact("roles"));
    }
    public function edit($role)
    {
        $role = User::find($role);
        return view("backend.role.edit", compact("role"));
    }
    public function update(Request $request, $role)
    {
        $role = User::find($role);
        $role->name = $request->name;
        $role->email = $request->email;
        $role->role = $request->role;
        $role->save();

        return redirect()->route("backend.role.index")->with("success","Role Updated Successfully");
    }
    public function delete(Request $request, $role)
    {
        $role = User::find($role);
        $role->delete();
        return redirect()->back()->with("success","Role Delete Successfully");
    }
}
