<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'country_code' => 'required|string|min:2|max:5',
            'mobile' => 'required|digits:10',
            'state' => 'required|string',
            'country' => 'required|string',
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
            'country.required' => 'The country field is required.',
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

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $fullMobile;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->sendEmailVerificationNotification();  # i need setuop  for this

            return redirect()->back()->with('message', 'Verification link sent!');
        }

    }
}
