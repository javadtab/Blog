<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index' , compact());
    }
    public function create()
    {
       return view('admin.permissions.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);
        return redirect('permission');
    }
    public function show($id)
    {
        $role = Permission::findOrFail($id);
        return view('admin.roles.index' , ['post' => $role]);
    }
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit' , compact('permission'));
    }
    public function update(Request $request , Permission $permission )
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);
        return redirect('permission');
    }
    public function destroy($id)
    {
        $permisssion = Permission::find($id);
        $permisssion->delete();
        return redirect('permission');
    }

}
