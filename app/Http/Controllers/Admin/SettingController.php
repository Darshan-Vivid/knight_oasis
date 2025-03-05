<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Setting;

class SettingController extends Controller
{
    public function show_general(){
        $settings = Setting::where('page','=','general')->get();
        return view('admin.settings.general')->with(["settings"=>$settings]);
    }

    public function save_general(Request $request){

        if(isset($request->logo_text) && strlen($request->logo_text) > 0){
            Setting::where('slug', '=', 'logo_text')->update(['value' => $request->logo_text]);
        }
        if(isset($request->site_title) && strlen($request->site_title) > 0){
            Setting::where('slug', '=', 'site_title')->update(['value' => $request->site_title]);
        }
        if(isset($request->admin_address) && strlen($request->admin_address) > 0){
            Setting::where('slug', '=', 'admin_address')->update(['value' =>$request->admin_address ]);
        }
        if(isset($request->admin_phone) && strlen($request->admin_phone) > 0){
            Setting::where('slug', '=', 'admin_phone')->update(['value' => $request->admin_phone]);
        }
        if(isset($request->admin_email) && strlen($request->admin_email) > 0){
            Setting::where('slug', '=', 'admin_email')->update(['value' => $request->admin_email]);
        }
        if(isset($request->site_copyright_text) && strlen($request->site_copyright_text) > 0){
            Setting::where('slug', '=', 'site_copyright_text')->update(['value' => $request->site_copyright_text]);
        }
        if(isset($request->map_link) && strlen($request->map_link) > 0){
            Setting::where('slug', '=', 'map_link')->update(['value' => $request->map_link]);
        }
        if(isset($request->hotel_surroundings) && strlen($request->hotel_surroundings) > 0){
            Setting::where('slug', '=', 'hotel_surroundings')->update(['value' => $request->hotel_surroundings]);
        }
        if(isset($request->hotel_rules) && strlen($request->hotel_rules) > 0){
            Setting::where('slug', '=', 'hotel_rules')->update(['value' => $request->hotel_rules]);
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
            Setting::where('slug', '=', 'site_icon')->update(['value' => $fileUrl]);
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
            Setting::where('slug', '=', 'site_logo_light')->update(['value' => $fileUrl]);
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
            Setting::where('slug', '=', 'site_logo_dark')->update(['value' => $fileUrl]);
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
            Setting::where('slug', '=', 'site_social_links')->update(['value' => $socialLinksJson]);
        }

        return redirect()->route('view.settings.general');
    }

    public function show_about_us(Request $request){
        $settings = Setting::where('page','=','about')->get();
        $amenities = Amenity::all();
        return view('admin.settings.about')->with(["settings"=>$settings,'amenities'=>$amenities]);
    }


    public function save_about_us(Request $request){
        $filePath = 'images/settings/';
        $directoryPath = public_path($filePath);

        if(isset($request->about_welcome_title) && strlen($request->about_welcome_title) > 0){
            Setting::where('slug', '=', 'about_welcome_title')->update(['value' => $request->about_welcome_title]);
        }
        if(isset($request->about_welcome_description) && strlen($request->about_welcome_description) > 0){
            Setting::where('slug', '=', 'about_welcome_description')->update(['value' => $request->about_welcome_description]);
        }
        if(isset($request->about_welcome_counter_text_1) && strlen($request->about_welcome_counter_text_1) > 0){
            Setting::where('slug', '=', 'about_welcome_counter_text_1')->update(['value' => $request->about_welcome_counter_text_1]);
        }
        if(isset($request->about_welcome_counter_text_2) && strlen($request->about_welcome_counter_text_2) > 0){
            Setting::where('slug', '=', 'about_welcome_counter_text_2')->update(['value' => $request->about_welcome_counter_text_2]);
        }
        if(isset($request->about_welcome_counter_count_1) && strlen($request->about_welcome_counter_count_1) > 0){
            Setting::where('slug', '=', 'about_welcome_counter_count_1')->update(['value' => $request->about_welcome_counter_count_1]);
        }
        if(isset($request->about_welcome_counter_count_2) && strlen($request->about_welcome_counter_count_2) > 0){
            Setting::where('slug', '=', 'about_welcome_counter_count_2')->update(['value' => $request->about_welcome_counter_count_2]);
        }
        if(isset($request->about_amenities)){
            Setting::where('slug', '=', 'about_amenities')->update(['value' => json_encode($request->about_amenities)]);
        }else{
            Setting::where('slug', '=', 'about_amenities')->update(['value' => json_encode([])]);
        }
        
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        
        foreach ($request->all() as $slug => $value) {
            if ($value instanceof \Illuminate\Http\UploadedFile) {
                $fileName = time() . '_' . $value->getClientOriginalName();
                $value->move($directoryPath, $fileName);
                $fileUrl = url($filePath . $fileName);
                Setting::where('slug', $slug)->update(['value' => $fileUrl]);
            }
        }

        return redirect()->route('view.settings.about');
    }
}
