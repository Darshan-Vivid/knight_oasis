<?php

use Illuminate\Support\Facades\DB;



// if (!function_exists('')) {
//     function ()
//     {
//         return ;
//     }
// }


if (!function_exists('getSetting')) {
    function getSetting($slug)
    {
        return DB::table('settings')->where('slug', $slug)->value('value');
    }
}


