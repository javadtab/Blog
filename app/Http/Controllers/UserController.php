<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Permission;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => User::all()
        ]);
    }
    public function show(Request $request ,$id)
    {
        $user = User::find($id);
        $ip = $request -> user()->ip ;
        $data = Location::get($ip);
        return view('users.view' ,compact('data') ,['user' => $user]);
    }

    public function permision(User $user)
    {
        return view('users.permision' , [
            'user' => $user,
            'permissions' => Permission::all()
        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit' ,compact('user'));
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'password' => ['required','min:8',Rules\Password::defaults()],
        ]);


        $user = User::find($id);
        $user->update($request->all());

        return redirect('/users');
    }

    public function updatePermision( User $user , Request $request)
    {
        $user->givePermissionTo($request->get('permissions'));

        return redirect('/users');
    }
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('users')->with('success','User Deleted successfully.');
    }
}
