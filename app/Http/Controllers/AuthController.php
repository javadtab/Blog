<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Stevebauman\Location\Facades\Location;

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
            'ip' => ['required'],
        ]);
          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'ip' => $request->ip,
        ]);
         return redirect()->route('login');
    }
    function dashboard()
    {
        return view('Dashboard');
    }
    function profile(Request $request)
    {


        $data = Location::get('ip');

        $lat = $data->latitude;
        $long = $data->longitude;

        $response =Http::get("https://api.neshan.org/v4/static",
        [
            'key'=>'service.237238137faa4c81ad61b4e11e48dd1c',
            'type'=> 'neshan',
            'zoom' =>16,
            'width' => 620,
            'height'=>400,
            'center'=> "$lat,$long",
            'markerToken'=>'421549.NOoYZTUs',
        ]);

        $map = base64_encode($response);
        return view('profile', compact('data' , 'map'));
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
