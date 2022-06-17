<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        return view('auth.login', compact('user'));
    }

    public function login(Request $request)
    {
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);
        if(auth("web")->attempt($data)){
            return redirect(route('index', compact('user')));
        }
        return redirect(route('login'))->withErrors(["email"=>"Ползователь не найден, либо данные введены не правильно"]);
    }

    public function logout(){
        auth("web")->logout();
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        $data = compact('user');
        return view('pages.index', $data);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required",],
        ]);
        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
        ]);
        if ($user) {
            auth("web")->login($user);
        }
        return redirect('/');
    }
}
