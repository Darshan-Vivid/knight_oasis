<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RedirectController extends Controller
{
    public function signup(){
        return view('auth.signup');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function otp_verify(){
        return view('auth.otp-verify');
    }
}
