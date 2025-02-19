<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Room;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function show_admin(){
        $user = Auth::user();
        return view('admin.dashboard')->with(["user"=>$user]);
    }

    public function show_settings(){
        $settings = DB::table('settings')->get();
        return view('admin.settings.general')->with(["settings"=>$settings]);
    }

    public function save_settings(Request $request){

        if(isset($request->logo_text) && strlen($request->logo_text) > 0){
            DB::table('settings')->where('slug', '=', 'logo_text')->update(['value' => $request->logo_text]);
        }
        if(isset($request->site_title) && strlen($request->site_title) > 0){
            DB::table('settings')->where('slug', '=', 'site_title')->update(['value' => $request->site_title]);
        }
        if(isset($request->admin_address) && strlen($request->admin_address) > 0){
            DB::table('settings')->where('slug', '=', 'admin_address')->update(['value' =>$request->admin_address ]);
        }
        if(isset($request->admin_phone) && strlen($request->admin_phone) > 0){
            DB::table('settings')->where('slug', '=', 'admin_phone')->update(['value' => $request->admin_phone]);
        }
        if(isset($request->admin_email) && strlen($request->admin_email) > 0){
            DB::table('settings')->where('slug', '=', 'admin_email')->update(['value' => $request->admin_email]);
        }
        if(isset($request->site_copyright_text) && strlen($request->site_copyright_text) > 0){
            DB::table('settings')->where('slug', '=', 'site_copyright_text')->update(['value' => $request->site_copyright_text]);
        }
        if(isset($request->site_icon) && $request->hasFile('site_icon')){
            $file = $request->file('site_icon');
            $fileName = $file->getClientOriginalName();
            $filePath = 'images/settings/';
            $directoryPath = public_path($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $file->move($directoryPath, $fileName);
            $fileUrl = url($filePath . $fileName);
            DB::table('settings')->where('slug', '=', 'site_icon')->update(['value' => $fileUrl]);
        }
        if(isset($request->site_logo_light) && $request->hasFile('site_logo_light')){
            $file = $request->file('site_logo_light');
            $fileName = $file->getClientOriginalName();
            $filePath = 'images/settings/';
            $directoryPath = public_path($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $file->move($directoryPath, $fileName);
            $fileUrl = url($filePath . $fileName);
            DB::table('settings')->where('slug', '=', 'site_logo_light')->update(['value' => $fileUrl]);
        }
        if(isset($request->site_logo_dark) && $request->hasFile('site_logo_dark')){
            $file = $request->file('site_logo_dark');
            $fileName = $file->getClientOriginalName();
            $filePath = 'images/settings/';
            $directoryPath = public_path($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $file->move($directoryPath, $fileName);
            $fileUrl = url($filePath . $fileName);
            DB::table('settings')->where('slug', '=', 'site_logo_dark')->update(['value' => $fileUrl]);
        }




        if (isset($request->settings_social_link_edited) && $request->settings_social_link_edited == "true") {
            $socialLinks = [];

            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'icon_') === 0 && isset($request->{'url_' . substr($key, 5)})) {
                    $icon = $value;
                    $url = $request->{'url_' . substr($key, 5)};

                    $socialLinks[] = [
                        'icon' => $icon,
                        'link' => $url
                    ];
                }
            }

            $socialLinksJson = json_encode($socialLinks, JSON_UNESCAPED_SLASHES);
            DB::table('settings')->where('slug', '=', 'site_social_links')->update(['value' => $socialLinksJson]);
        }

        $settings = DB::table('settings')->get();
        return redirect()->route('view.settings')->with(["settings"=>$settings]);
    }

    public function show_users(){
        $users = User::whereDoesntHave('roles', fn($q) => $q->where('name', 'admin'))->get();
        return view('admin.users.all')->with(["users"=>$users]);
    }
    public function show_transactions(){
        $transactions = Transaction::all();
        return view('admin.bookings.transactions')->with(["transactions"=>$transactions]);
    }
    
}
