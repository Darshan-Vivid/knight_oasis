<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RedirectController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function show_about(){
        return view('about');
    }

    public function show_faqs(){
        return view('faqs');
    }

    public function show_contact(){
        return view('contact');
    }
    public function mail_contact(Request $request){

        $rules = [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ];

        $messages = [
            'fname.required' => 'First name is required.',
            'fname.string' => 'First name must be a valid string.',
            'fname.max' => 'First name should not exceed 255 characters.',
            'lname.required' => 'Last name is required.',
            'lname.string' => 'Last name must be a valid string.',
            'lname.max' => 'Last name should not exceed 255 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Enter a valid email address.',
            'email.max' => 'Email should not exceed 255 characters.',
            'subject.required' => 'Subject is required.',
            'subject.string' => 'Subject must be a valid string.',
            'subject.max' => 'Subject should not exceed 255 characters.',
            'message.required' => 'Message is required.',
            'message.string' => 'Message must be a valid string.',
            'message.min' => 'Message should be at least 10 characters long.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $mailData = [
                'email' => $request->email,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail($mailData));
            return redirect()->back();
        }


    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function newPassword($token){
        $user = User::where('token', $token)->first();

        if ($user && isset($user->email)) {
            return view('auth.reset_password')->with([
                'email' => $user->email,
                'token' => $token
            ]);
        } else {
            return redirect()->route('view.signup')->with([
                'success' => false,
                'message' => 'invalid request'
            ]);
        }
    }

    public function show_home(){
        $user = Auth::user();
        $rooms = Room::all();
        return view('home')->with(["user"=>$user,"rooms"=>$rooms]);
    }

    public function show_rooms(){
        $rooms = Room::all();
        return view('rooms')->with(["rooms"=>$rooms]);
    }

    public function show_room($slug){
        $find_booking = Session::get('find_booking') ?? [];
        $room = Room::where('slug','=',$slug)->first();
        $services = Service::where('status' , '=', '1')->get();
        return view('room')->with(["room"=>$room,"services"=>$services,"find_booking"=>$find_booking]);
    }

    public function routeList($methods = null)
    {
        $routes = Route::getRoutes();
        $routeDetails = [];

        foreach ($routes as $route) {
            $uri = $route->uri();
            $name = $route->getName();
            $action = $route->getActionName();
            $methodsForRoute = $route->methods();

            if ($methods && !in_array($methods, $methodsForRoute)) {
                continue;
            }

            $routeDetails[] = ['uri' => $uri, 'name' => $name, 'action' => $action, 'methods' => $methodsForRoute];
        }

        return view('admin.routes_index', compact('routeDetails'));
    }



}
