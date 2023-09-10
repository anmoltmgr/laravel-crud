<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function PostRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required'
        ]);

        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        auth()->attempt($validated);

        return redirect('/');
    }
}
