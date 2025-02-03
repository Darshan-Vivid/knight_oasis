<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RedirectController extends Controller
{
    public function signup(){
        return view('signup');
    }
    public function verification_notice(){
        return view('auth.verify-email');
    }

    public function auth_verify(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    }

    public function dashboard(){
        return view('view.dashboard');
    }
}
