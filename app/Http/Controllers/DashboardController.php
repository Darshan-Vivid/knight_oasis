<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function save_settings(Request $request){

        // dd($request->all());

        // if(isset($request->logo_text) && strlen($request->logo_text)){}
        // if(isset($request->site_title) && strlen($request->site_title)){}
        // if(isset($request->admin_address) && strlen($request->admin_address)){}
        // if(isset($request->admin_phone) && strlen($request->admin_phone)){}
        // if(isset($request->admin_email) && strlen($request->admin_email)){}
        // if(isset($request->site_copyright_text) && strlen($request->site_copyright_text)){}
        // if(isset($request->site_logo) && strlen($request->site_logo)){}
        // if(isset($request->logo_text) && strlen($request->logo_text)){}
        // if(isset($request->logo_text) && strlen($request->logo_text)){}
        // if(isset($request->logo_text) && strlen($request->logo_text)){}
        // if(isset($request->logo_text) && strlen($request->logo_text)){}

        $settings = DB::table('settings')->get();
        return redirect()->route('view.settings')->with(["settings"=>$settings]);
    }


}
