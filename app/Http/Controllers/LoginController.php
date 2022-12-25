<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function indexLogin(){
        return view('login');
    }

    public function loginAction(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->with('errorLogin','Email or Password Invalid !');
    }

    public function logout(Request $request){
    	Auth::logout();
    	$request->session()->invalidate();
    	$request->session()->regenerateToken();

    	return redirect('/login');

    }
}
