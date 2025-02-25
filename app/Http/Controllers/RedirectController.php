<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    public function show_room($id){

        $room = Room::findOrFail($id);
        $services = Service::where('status' , '=', '1')->get();
        return view('room')->with(["room"=>$room,"services"=>$services,]);
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
