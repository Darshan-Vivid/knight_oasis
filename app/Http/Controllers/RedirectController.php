<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RedirectController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }

    public function login(){
        return view('auth.login');
    }

    public function forgotPassword(){
        return view('auth.forgot-password'); 
    }

    public function newPassword($token){
        $user = User::where('token', $token)->first();

        if ($user && isset($user->email)) {
            return view('auth.reset_password')->with([
                'email' => $user->email,
                'token' => $token // Pass the token to the view
            ]);
        } else {
            return redirect()->route('view.signup')->with([
                'success' => false,
                'message' => 'invalid request'
            ]);
        }
    }
}
