<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        return view('users.auth');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:5',
        ]);

        $credentials = $request->only('name', 'password');

        if(User::where('name', $request->only('name'))->first())
        {
            if (Auth::attempt($credentials))
            {
                return redirect()->intended('/');
            }

            return redirect('/login')->withErrors(['password' => 'Wrong Password']);
        }
        else
        {
            $this->register($credentials);

            if (Auth::attempt($credentials))
            {
                return redirect()->intended('/');
            }

            return redirect('/login');
        }
    }

    protected function register(array $credentials)
    {
        return User::create([
            'name' => $credentials['name'],
            'password' => Hash::make($credentials['password']),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
