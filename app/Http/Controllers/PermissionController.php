<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use App\Model\Permission_role;
use App\Model\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $role = Role::all();
//        dd($role);
        return view("Permission.index",compact('role'));

//        dd($permissions->toArray());
    }

    public function PermissionRole($id)
    {
        $role = Role::where('id',$id)->first();
        $permissions = $role->permissions;
        return response()->json($permissions);
    }
}
