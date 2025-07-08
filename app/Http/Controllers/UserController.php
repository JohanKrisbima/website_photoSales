<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return view('/login');
        }
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        else{
            return view('/register');
        }
        
    }

    public function logincheck(Request $request){
         $credential = $request->validate([          
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('loginError', 'Email atau kata sandi salah');
        }
    }

    public function registercheck(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'telpon' => 'required',
            'password' => 'required',
        ]);

        $user = User::Create($validation);

        // Auth::login($user);

        return redirect()->route('login');
    }

    public function goHome(){
        if(Auth::check() && Auth::user()->usertype=='admin'){
            return view('admin.home');
        }else if(Auth::check() && Auth::user()->usertype=='user'){
            return view('home');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
