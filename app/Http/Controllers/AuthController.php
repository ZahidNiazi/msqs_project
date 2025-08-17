<?php

namespace App\Http\Controllers;



use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register()
    {
        return view('auth/register');

    }

    public function registerSave( Request $request)
    {
        Validator::make($request->all(),

        [
        //    dd($request->all()),
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'User'
        ]);

        return redirect()->route('login');
    }


    public function login()
    {
        return view('auth/login');

    }


  public function loginAction(Request $request)
{
    Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ])->validate();

 if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
    // Authentication failed
    return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
}

    $request->session()->regenerate();

    if ($request->session()->has('url.intended')) {
        $url = $request->session()->get('url.intended');
        $request->session()->pull('url.intended');
        return redirect($url);
    }

    if (\Auth::user()->level == 'Admin') {
        return redirect()->route('dashboard');
    }

    return redirect('home');
}

public function logout(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    return redirect()->route('login');
}

}
