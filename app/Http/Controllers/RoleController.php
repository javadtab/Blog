<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;


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

    public function addPermission(Request $request)
    {
        $permissions = [
            'cr7',
            'cr6'
        ];

        foreach ($permissions as $permission) {
          Permission::create(['name' => $permission]);
        }
    }
    public function setRole(User $user, $id , Role $role )
    {
        $roles = Role::all();
        $user = User::find($id);

        return view('admin.roles.setRole' , compact( 'user','roles', 'role'));
    }
    public function updateRole(Request $request)
    {
        $user = User::find($request->input('user_id'));

        if(!$user){
            return redirect()->route('users')->with('message' , 'User is not exist');
        }

            $user->assignRole($request->input('role_name'));

           return redirect()->route('users');
    }

}
