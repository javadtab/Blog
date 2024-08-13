<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit' , [
            'user' => $user,
            'permissions' => Permission::all()
        ]);
    }

    public function update( User $user , Request $request)
    {
        $user->givePermissionTo($request->get('permissions'));

        return redirect('/users');
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('user.index')->with('success','User Deleted successfully.');
    }
}
