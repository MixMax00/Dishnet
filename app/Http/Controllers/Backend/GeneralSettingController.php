<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class GeneralSettingController extends Controller
{
    public  function generalSetting()
    {
        return view('backend.Settings.generalSetting.setting');
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => "required",
        ]);


      // return $request->all();


       $general_setting = GeneralSetting::where('sp_id',auth()->user()->sp_id)->first();

      // return $general_setting;

       if (!empty($general_setting)){
           if ($request->file('app_logo') || $request->hasFile('app_fav_icon')){

               if ($request->file('app_logo')){
                   $image = $request->file('app_logo');
                   $directory = 'assets/image/provider/';
                   $height = 100;
                   $width = 100;
                   $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
                   $general_setting->app_logo = $image_url;
               }

               if ($request->file('app_fav_icon')){
                   $image2 = $request->file('app_fav_icon');
                   $directory = 'assets/image/provider/';
                   $height = 100;
                   $width = 100;
                   $image_url = ApiResponse::image_upload($image2,$directory,$height,$width);
                   $general_setting->fav_icon = $image_url;
               }

               $general_setting->app_name = $request->app_name;
               $general_setting->save();


           }else{
               $general_setting->app_name = $request->app_name;
               $general_setting->save();
           }

           Toastr::success('Settings update successfully', 'Success', ["positionClass" => "toast-top-right"]);
           return back();
       }else{
           $general_setting = new GeneralSetting();
           if ($request->file('app_logo') || $request->hasFile('app_fav_icon')){

               if ($request->file('app_logo')){
                   $image = $request->file('app_logo');
                   $directory = 'assets/image/provider/';
                   $height = 100;
                   $width = 100;
                   $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
                   $general_setting->app_logo = $image_url;
               }

               if ($request->file('app_fav_icon')){
                   $image2 = $request->file('app_fav_icon');
                   $directory = 'assets/image/provider/';
                   $height = 100;
                   $width = 100;
                   $image_url = ApiResponse::image_upload($image2,$directory,$height,$width);
                   $general_setting->fav_icon = $image_url;
               }
               $general_setting->sp_id = auth()->user()->sp_id;
               $general_setting->app_name = $request->app_name;
               $general_setting->save();


           }else{
               $general_setting->sp_id = auth()->user()->sp_id;
               $general_setting->app_name = $request->app_name;
               $general_setting->save();
           }
           Toastr::success('Settings update successfully.', 'Success', ["positionClass" => "toast-top-right"]);
           return back();
       }


      // return  $general_setting;


    }


}
