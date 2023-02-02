<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
use Brian2694\Toastr\Facades\Toastr;


class ProfileController extends Controller
{
    public function profileUpdate()
    {
        return view('backend.profile.update');
    }

    public function Update(Request $request)
    {

       // return $request->all();

        if($request->file('image')){
            //unlink(auth()->user()->image);

            $image = $request->file('image');
            $directory = 'assets/image/provider/';
            $height = 100;
            $width = 100;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);

            User::where('id', auth()->user()->id)->update([
                "sp_representative" => $request->owner_name,
                "sp_cell_number"  => $request->contact_number,
                "image"  => $image_url,
            ]);
        }else{
            User::where('id', auth()->user()->id)->update([
                "sp_representative" => $request->owner_name,
                "sp_cell_number"  => $request->contact_number,
            ]);
        }

        Toastr::success('Profile update successfully', 'Area Location', ["positionClass" => "toast-top-right"]);
        return back();
    }


}
