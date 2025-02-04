<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OTPMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function signup(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'country_code' => 'required|string|min:2|max:5',
            'mobile' => 'required|digits:10',
            'state' => 'required|string|min:2',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 3 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'country_code.required' => 'The country code field is required.',
            'country_code.string' => 'The country code must be a string.',
            'country_code.min' => 'The country code must be at least 2 characters.',
            'country_code.max' => 'The country code must not exceed 5 characters.',
            'mobile.required' => 'The mobile field is required.',
            'mobile.digits' => 'The mobile must be exactly 10 digits.',
            'state.required' => 'The state field is required.',
            'state.min' => 'The name must be at least 2 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password_confirmation.required' => 'The password confirmation field is required.',
            'password_confirmation.same' => 'The password confirmation must match the password.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $fullMobile = $request->country_code . $request->mobile;
        $existingUserWithEmail = User::where('email', $request->email)->first();
        $existingUserWithMobile = User::where('mobile', $fullMobile)->first();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        elseif ($existingUserWithEmail) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.'])->withInput();
        }
        elseif ($existingUserWithMobile) {
            return redirect()->back()->withErrors(['mobile' => 'Mobile number already exists.'])->withInput();
        }
        else{

            $otp = rand(100000, 999999);
            $token = Str::random(20);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $fullMobile;
            $user->state = $request->state;
            $user->country = $request->country_code;
            $user->otp = $otp;
            $user->token = $token;
            $user->password = Hash::make($request->password);
            $user->otp_expires_at = Carbon::now()->addMinutes(30);
            $user->save();

            $mailData = [
                'email' => $user->email,
                'otp' => $otp,
                'user_name' => $user->name,
            ];

            Mail::to($user->email)->send(new OTPMail($mailData));
            return redirect()->route('view.otp_verify',$token)->with('message', 'User Registered Successfully. Check your mail for verification!')->with("email",$user->email);
        }
    }


    public function view_otp_verify($token){
        $user = User::where('token', $token)->first();

        if(isset($user->email)){
            return view('auth.otp-verify')->with("email",$user->email);
        }else{
            return redirect()->route('view.signup')->with([
                'success' => false,
                'message' => 'invalid request'
            ]);
        }
    }

    public function otp_verify(Request $request){
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->otp != $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        if (Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        $user->otp = null;
        $user->otp_expires_at = null;
        $user->token = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('view.dashboard')->with([
            'success' => true,
            'message' => 'Email and OTP verified successfully.'
        ]);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{

        }

    }


}
