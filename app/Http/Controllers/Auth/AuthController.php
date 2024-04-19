<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Rules\EmailSena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
       return view('auth.register');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => ['required', 'email', new EmailSena()],
            'password' => ['required', 'string'],
        ]);

        if(auth()->attempt($request->only(['email', 'password']))){
            return redirect()->route('home');
        }
        return back()->with('error', 'credenciales incorrectas');
    }

    public function store(RegisterRequest $request){
        $user = new User($request->validated());
        $user->save();

        Auth::login($user);
        auth()->user()->sendEmailVerificationNotification();


        return redirect()->route('login');
    }
}
