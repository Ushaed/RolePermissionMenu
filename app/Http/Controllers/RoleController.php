<?php

namespace App\Http\Controllers;

use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();
        return view('Role.index',compact('data'));
    }

    public function create()
    {
        return view('Role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:4|unique:roles,name'
        ]);
        $data = Role::create([
            'name'=> $request->name,
            'description'=>$request->description
        ]);
        session()->flash('message', 'Role Created');
        session()->flash('type', 'success');
        return redirect()->route('role.index');
    }

    public function show($id)
    {
        $data = Role::findOrFail($id);
        return response()->json($data);
    }
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('Role.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:4|unique:roles,name,' .$id
        ]);
        $data = Role::findOrFail($id);
        $data ->update([
            'name'=> $request->name,
            'description'=>$request->description
        ]);
        session()->flash('message', 'Role Updated');
        session()->flash('type', 'success');
        return redirect()->route('role.index');
    }
    public function exist(Request $request)
    {
        $exist = Role::where('name','=',$request->name)->first();
        if ($exist){
            return response()->json(false);
        }
        return response()->json(true);
    }

    public function storeajax(Request $request)
    {
//        return response()->json('data');
        $this->validate($request,[
            'name'=>'required|min:4|unique:roles,name'
        ]);
        $data = Role::create([
            'name'=> $request->name,
            'description'=>$request->description
        ]);
        return response()->json($data);
    }
}
