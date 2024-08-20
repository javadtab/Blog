<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Http;
use Illuminate\Http\Request;
use Modules\Users\App\Models\User;
use Stevebauman\Location\Facades\Location;

class AuthController extends Controller
{
    public function welcome(){
        return view('auth::welcome');
    }
    public function register(){
        return view('auth::register');
    }

    public function registerPost(Request $request)
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
         return redirect()->route('login');
    }
    public function dashboard()
    {
        return view('auth::Dashboard');
    }
    public function login()
    {
        return view('auth::login');
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
    public function profile(Request $request)
    {
        $ip = $request -> user()->ip ;
        $data = Location::get($ip);

        $lat = $data->latitude;
        $long = $data->longitude;

        $response =Http::get("https://api.neshan.org/v4/static",
        [
            'key'=>'web.611a004ba12a434ebcaf3bcb33d19ce8',
            'type'=> 'neshan',
            'zoom' =>16,
            'width' => 620,
            'height'=>400,
            'center'=> "$lat,$long",
            'markerToken'=>'421549.NOoYZTUs',
        ]);

        $map = base64_encode($response);
        return view('auth::profile.index', compact('data' , 'map'));
    }
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return view('auth::profile.index' ,compact('user'));
    }
    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        return view('auth::profile.edit' ,compact('user'));
    }
    public function  updateProfile(Request $request , $id)
    {
        $request->validate([
            'password' => ['required','min:8',\Illuminate\Validation\Rules\Password::defaults()],
        ]);


        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('profile.index')->with('success' , 'success');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
