<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index' ,compact('roles'));
    }
    public function create()
    {
       return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        $request->validate([
             'name' => 'required'
        ]);
        $role = new Role;
        $role ->name = $request->name;
        $role->save();

        return redirect('roles');
    }
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.index' , ['post' => $role]);
    }
    public function edit(Role $role )
    {
       $permission = Permission::all();
        return view('admin.roles.edit' , compact('role','permission'));
    }
    public function update(Request $request , $id)
    {
          $request->validate([
            'name' => 'required'
          ]);
          $role = Role::find($id);
          $role->update($request->all());

          return redirect('roles');
    }
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('roles');
    }

}
