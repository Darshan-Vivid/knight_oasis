<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){

        $user = Auth::user();
        if($user){
            if($user->hasRole('superAdmin')){ //admin
                return view('admin.dashboard')->with(["user"=>$user]); 
            }else{ //customer
                return view('dashboard')->with(["user"=>$user]);
            }
        }else{//guest
            return view('dashboard')->with(["user"=>$user]);
        }
    }

}
