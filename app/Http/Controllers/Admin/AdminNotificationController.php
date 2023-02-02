<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\NotificationCustomer;
use App\Models\User;
use App\Services\FCMService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{


    public function getNotificationCustomer()
    {
        return view('backend.superAdmin.adminNotification.customerNotification');
    }

    public function sendNotificationrToCustomer(Request $request)
    {


        if ($request->has('image')){
            $image = $request->file('image');
            $directory = 'assets/image/provider/';
            $height = 50;
            $width = 50;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);

            $notification = NotificationCustomer::create([
                "sp_id" => " ",
                "title" => $request->title,
                "body" => $request->body,
                "image" => $image_url,
            ]);


            $users = User::where('isAccept', 0)->get();

            foreach ($users as $user){
                FCMService::send(
                    $user->fcm_token,
                    [
                        'title' => $notification->title,
                        'body' => $notification->body,
                        'image' => $notification->image,
                    ]
                );
            }

        }

        Toastr::success('Notification send successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }
}
