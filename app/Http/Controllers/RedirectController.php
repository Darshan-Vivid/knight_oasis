<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    public function show_contact(){
        return view('contact');
    }
    public function mail_contact(Request $request){

        $rules = [
            'fname' => 'required|string|min:2|max:255',
            'lname' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:5|max:255',
            'message' => 'required|string|min:10',
            'g-recaptcha-response' => 'required'
        ];

        $messages = [
            'fname.required' => 'First name is required.',
            'fname.string' => 'First name must be a valid string.',
            'fname.min' => 'First name must be at least 2 characters long.',
            'fname.max' => 'First name should not exceed 255 characters.',
            'lname.required' => 'Last name is required.',
            'lname.string' => 'Last name must be a valid string.',
            'lname.min' => 'Last name must be at least 2 characters long.',
            'lname.max' => 'Last name should not exceed 255 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Enter a valid email address.',
            'email.max' => 'Email should not exceed 255 characters.',
            'subject.required' => 'Subject is required.',
            'subject.string' => 'Subject must be a valid string.',
            'subject.min' => 'Subject must be at least 2 characters long.',
            'subject.max' => 'Subject should not exceed 255 characters.',
            'message.required' => 'Message is required.',
            'message.string' => 'Message must be a valid string.',
            'message.min' => 'Message should be at least 10 characters long.',
            'g-recaptcha-response.required' => 'Please solve the captcha before submitting.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $recaptchaResponse = $request->input('g-recaptcha-response');
            $secretKey = env('CAPTCHA_SECRET_KEY'); 

            $verifyResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ]);

            $responseData = $verifyResponse->json();

            if (!$responseData['success']) {
                return back()->withErrors(['g-recaptcha-response' => 'reCAPTCHA verification failed. Please try again.']);
            }


            $mailData = [
                'email' => $request->email,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail($mailData));
            return redirect()->route('view.home')->with([
                'success' => true,
                'message' => 'Thanks for Contact us, We will contact you back shortly '
            ]);
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
        $blogs = Blogs::latest()->take(3)->get();

        if ($blogs->count() < 3) {
            $blogs = collect([]);
        }

        return view('home')->with(["user"=>$user,"rooms"=>$rooms,"blogs"=>$blogs]);
    }

    public function show_rooms(){
        $rooms = Room::all();
        return view('rooms')->with(["rooms"=>$rooms]);
    }

    public function show_room($slug){
        $booking_session = Session::get('find_booking', []);
        $find_booking = [];

        if (!empty($booking_session)) {
            $filtered = array_filter($booking_session, function ($session_room) use ($slug) {
                return $session_room['room_type'] == $slug;
            });
            $find_booking = array_values($filtered)[0] ?? [];
        }

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
