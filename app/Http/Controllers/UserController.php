<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        // Alert::alert(session('success'));
        // dd(session('success'));
        return view('auth.index');
    }

    public function login(){
        // dd(session('errors'));
        // session('success') ? Alert::alert(session('success')) : '';
        return view('auth.login');
    }

    public function loginProcess(Request $request){
        $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('dashboard'))->with('success','Login berhasil');
        }
        return back()->with('error','Login gagal');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();

        return redirect(route('login'))->with('success','Berhasil logout');
    }
}
