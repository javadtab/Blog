<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    function register(){
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:'.User::class],
            'phonenumber' => ['required'],
            'password' => ['required','min:8',Rules\Password::defaults()],
        ]);
          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
        ]);
         return redirect()->route('login');
    }
    function dashboard()
    {
        return view('Dashboard');
    }

    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/dashboard')->with('success','Login successfuly');
        }
        return back()->with('error', 'Email or Password incorrect');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
