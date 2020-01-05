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
        return view("Permission.index",compact('role'));
    }

    public function create()
    {
        $role = Role::all();
        return view('Permission.create',compact('role'));
    }

    public function show()
    {
        return view('Permission.show');
    }
    public function PermissionRole($id)
    {
        $role = Role::where('id',$id)->first();
        $permissions = $role->permissions;
        return response()->json($permissions);
    }

    public function PermissionRoleAdd($id)
    {
        $allAvailablePermission = Permission::all();
        $role = Role::where('id',$id)->first();
        $permissions = $role->permissions;
        return response()->json(['permission'=>$permissions,'allAvailablePermission'=>$allAvailablePermission]);
    }
}
