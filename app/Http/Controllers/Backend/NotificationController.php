<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\NotificationCustomer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Services\FCMService;

class NotificationController extends Controller
{
    public function getCustomerNotification(){
       $new_customer_count = Customer::where('sp_id', auth()->user()->sp_id)->where('isAccept',0)->count();
       return $new_customer_count;
    }

    public function getNotificationCustomer()
    {
        return view('backend.notification.customerNotification');
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
                "sp_id" => auth()->user()->sp_id,
                "title" => $request->title,
                "body" => $request->body,
                "image" => $image_url,
            ]);


           $users = User::all();

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
