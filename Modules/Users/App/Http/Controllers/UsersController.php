<?php

namespace Modules\Users\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use Modules\Users\App\Models\User;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;
use Stevebauman\Location\Facades\Location;
class UsersController extends Controller
{
    public function index()
    {
        return view('users::index',[
            'users' => User::all()
        ]);
    }
    public function createUser()
    {
        return view('users::create');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:'.User::class],
            'phonenumber' => ['required'],
            'password' => ['required','min:8',\Illuminate\Validation\Rules\Password::defaults()],
            'ip' => ['required'],
        ]);
          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'ip' => $request->ip,
        ]);
        return redirect('/users');
    }

    public function show(Request $request ,$id)
    {
        $user = User::find($id);
        $ip = $request -> user()->ip ;
        $data = Location::get($ip);
        return view('users::view' ,compact('data') ,['user' => $user]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users::edit' ,compact('user'));
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
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('users')->with('success','User Deleted successfully.');
    }
    ////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
    public function permision(User $user)
    {
        return view('users::permision' , [
            'user' => $user,
            'permissions' => Permission::all()
        ]);
    }
    public function updatePermision( User $user , Request $request)
    {
        $user->givePermissionTo($request->get('permissions'));

        return redirect('/users');
    }

}
