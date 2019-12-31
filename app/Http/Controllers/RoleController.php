<?php

namespace App\Http\Controllers;

use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();
//        dd($data->toArray());
        return view('Role.index',compact('data'));
    }

    public function create()
    {
        return view('Role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:4'
        ]);
        $data = Role::create([
            'name'=> $request->name,
            'description'=>$request->description
        ]);
        return redirect()->route('role.index');
    }
}
