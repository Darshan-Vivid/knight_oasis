<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show_user(){
        $user = Auth::user();
        return view('dashboard')->with(["user"=>$user]);
    }

    public function show_admin(){
        $user = Auth::user();
        return view('admin.dashboard')->with(["user"=>$user]);
    }

    public function show_settings(){
        $settings = DB::table('settings')->get();
        return view('admin.settings.general')->with(["settings"=>$settings]);
    }

}
