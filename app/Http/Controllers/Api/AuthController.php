<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\Customer;
use App\Models\ForgotPinOTP;
use App\Models\GeneralSetting;
use App\Models\RegistrationOTP;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TEACHER LOGIN  -POST

    public function login(Request $request){


        // return $request;

        $data = $request->validate([
            "sp_id"=>'required',
            "cell_number"   => "required",
            "pin"   => "required",
        ]);


        // $hashedPassword = Hash::make($request->password);
        $sp = User::where('sp_id',$request->sp_id)->first();

        if ($sp){
            $user = Representative::with('general_settings')->where('cell_number', $request->cell_number)->where('sp_id',$request->sp_id)->first();
            //return $hashedPassword;

            //return $user;

            if($user){
                if(Hash::check($request->pin,$user->pin)){
                    $token = $user->createToken("auth_token")->accessToken;

                    return ApiResponse::login($user,$token);

                }else{
                    return ApiResponse::login_credintial_check('Cell Number and Pin Incorrect');
                }
            }
            else{
                return ApiResponse::error('401','Employee Not  Found');
            }
        }else{
            return ApiResponse::error('401','Services Provider ID Incorrect');
        }





    }

    public function profile()
    {
        $profile = Auth::guard('employee')->user()->id;
        $data = Representative::with('areas','areas.areas_name')->find($profile);
        return response()->json([
            "data"  =>  $data,
        ]);
    }

    public function logout(){
        $user = Auth::guard('employee')->user()->token();
        $user->revoke();
        return ApiResponse::logout();
    }



    public function user_login(Request $request){


        // return $request;

        $data = $request->validate([
            "cell_number"   => "required",
            "pin"   => "required",
        ]);


        // $hashedPassword = Hash::make($request->password);



        $user = Customer::where('cell_number', $request->cell_number)->first();
//            return $hashedPassword;

//            return $user;

//            if(!Auth::guard('customer')->attempt($data)){
//
//                return response()->json([
//                    "status"   => false,
//                    "message"  => "Invalid Credentials",
//                ]);
//            }
//
//            $token = Auth::guard('student')->user()->createToken("auth_token")->accessToken;
//            return ApiResponse::login($user,$token);

        if($user){
            if(Hash::check($request->pin,$user->password)){
                $token = $user->createToken("auth_token")->accessToken;

                return ApiResponse::login($user,$token);

            }else{
                return ApiResponse::login_credintial_check('Cell Number and Pin Incorrect');
            }
        }
        else{
            return ApiResponse::error('401','Cell Number Incorrect');
        }





    }

    public function customer_profile_update(Request $request){
        $request->validate([
            'customer_name'=>'required'
        ]);
        $profile = Auth::guard('customer')->user()->id;
        $data = Customer::find($profile);

        $data->customer_name = $request->customer_name;
        $data->email = $request->email;
        $data->dob = $request->dob;
        $data->nid = $request->nid;
        $data->profession = $request->profession;
        $data->address = $request->address;
        $data->save();

        return ApiResponse::success($data);

//        return $data;
    }

    public function update_image(Request  $request){
//        return auth()->guard('employee')->user();
        $request->validate([
            'image'=>'required',

        ]);

//      return auth()->guard('employee')->user();

        $em = Representative::where('id',auth()->guard('employee')->user()->id)->first();
//return $em;
        if ( $em->image!= null){
            unlink(auth()->guard('employee')->user()->image);

            $image = $request->file('image');
            $directory = 'assets/image/employee/';
            $height = 100;
            $width = 100;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
            $em -> image = $image_url;
            $em->save();

        }else{
            $image = $request->file('image');
            $directory = 'assets/image/employee/';
            $height = 100;
            $width = 100;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
            $em ->image = $image_url;
            $em->save();
        }

        return ApiResponse::success($em);
    }

    public function customer_update_image(Request  $request){
//        return auth()->guard('employee')->user();
        $request->validate([
            'image'=>'required',

        ]);

//      return auth()->guard('employee')->user();

        $em = Customer::where('id',auth()->guard('customer')->user()->id)->first();
//return $em;
        if ( $em->image!= null){
            unlink(auth()->guard('customer')->user()->image);

            $image = $request->file('image');
            $directory = 'assets/image/customer/';
            $height = 100;
            $width = 100;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
            $em -> image = $image_url;
            $em->save();

        }else{
            $image = $request->file('image');
            $directory = 'assets/image/customer/';
            $height = 100;
            $width = 100;

            $image_url = ApiResponse::image_upload($image,$directory,$height,$width);
            $em ->image = $image_url;
            $em->save();
        }

        return ApiResponse::success($em);
    }


    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'cell_number'=>'required'
        ]);

        $c = Customer::where('cell_number',$request->cell_number)->first();

        if ($c){
            return ApiResponse::login_credintial_check('This cell number already used');
        }

        $customer = new Customer();
        $customer->customer_id = 'sa'.uniqid();
        $customer->customer_name = $request->name;
        $customer->cell_number = $request->cell_number ;
        $customer->email = $request->email ;
        $customer->profession = $request->profession ;
        $customer->dob = $request->dob ;
        $customer->nid = $request->nid ;
        $customer->address = $request->address;
        $customer->save();


        //        $cell = Customer::where('cell_number',$request->cell_number)->first();
//        if ($cell){
//            return ApiResponse::dataExsits();
//        }
        $otp = rand(1111,9999);
        $DOMAIN = "https://smsplus.sslwireless.com";
        $SID = "DISHNET1";
        $API_TOKEN  = "DesktopIT-b5b257fb-2732-4905-99e9-54d0d206e9db";

        $messageData = [
            [
                "msisdn" => $request->cell_number,
                "text" => "Your DishNet OTP is ".$otp,
                "csms_id" => uniqid(),
            ]
        ];
        $params = [
            "api_token" => $API_TOKEN,
            "sid" => $SID,
            "sms" => $messageData,
        ];
        $params = json_encode($params);
        $url = trim($DOMAIN, '/')."/api/v3/send-sms/dynamic";

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $otps = new RegistrationOTP();
        $otps->customer_id = $customer->id;
        $otps->otp = $otp;
        $otps->save();

        $data = ['otp'=>$otp];

        return ApiResponse::otp($data);
//        return $response;


    }

    public function otp_check(Request $request){
        $request->validate([
            'otp'=>'required'
        ]);

        $otp = RegistrationOTP::where('otp',$request->otp)->first();
        if ($otp){
            $data = ['otp'=>$otp->otp];
            return ApiResponse::success($data);
        }else{

            return ApiResponse::error(404,'Wrong OTP');

        }





    }

    public function pin_set(Request $request){

        $request->validate([
            'pin'=>'required|confirmed',
            'otp'=>'required'
        ]);

        $otp = RegistrationOTP::where('otp',$request->otp)->first();

        if ($otp == null){
            return ApiResponse::error('404','Wrong OTP');
        }


        $customer = Customer::find($otp->customer_id);

        $customer->password = Hash::make($request->pin);
        $customer->save();

        $otp->delete();

        return ApiResponse::success($customer);

    }

    public function customer_profile(){
        // $data = Customer::with('general_settings')->where('customer_id',auth()->guard('customer')->user()->customer_id)->first();
        $data =  auth()->guard('customer')->user();

        //$data = Auth::guard('customer')->user();

        return ApiResponse::success($data);
    }

    public function customer_logout(){
        $user = Auth::guard('customer')->user()->token();
        $user->revoke();
        return ApiResponse::logout();
    }


    public function forgot_pin(Request $request){
        $request->validate([
            'cell_number'=>'required'
        ]);

        $customer = Customer::where('cell_number',$request->cell_number)->first();

        if ($customer){
            $otp = rand(1111,9999);
            $DOMAIN = "https://smsplus.sslwireless.com";
            $SID = "DISHNET1";
            $API_TOKEN  = "DesktopIT-b5b257fb-2732-4905-99e9-54d0d206e9db";

            $messageData = [
                [
                    "msisdn" => $request->cell_number,
                    "text" => "Your DishNet forgot pin OTP is ".$otp,
                    "csms_id" => uniqid(),
                ]
            ];
            $params = [
                "api_token" => $API_TOKEN,
                "sid" => $SID,
                "sms" => $messageData,
            ];
            $params = json_encode($params);
            $url = trim($DOMAIN, '/')."/api/v3/send-sms/dynamic";

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params),
                'accept:application/json'
            ));

            $response = curl_exec($ch);
            curl_close($ch);

            $otps = new ForgotPinOTP();
            $otps->customer_id = $customer->id;
            $otps->otp = $otp;
            $otps->save();

            $data = ['otp'=>$otp];

            return ApiResponse::otp($data);

        }else{
            return ApiResponse::not_found();
        }


    }

    public function forgot_otp_check(Request $request){
        $request->validate([
            'otp'=>'required'
        ]);

        $otp = ForgotPinOTP::where('otp',$request->otp)->first();
        if ($otp){
            $data = ['otp'=>$otp->otp];
            return ApiResponse::success($data);
        }else{

            return ApiResponse::error(404,'Wrong OTP');

        }


    }

    public function forgot_pin_set(Request $request){

        $request->validate([
            'pin'=>'required|confirmed',
            'otp'=>'required'
        ]);

        $otp = ForgotPinOTP::where('otp',$request->otp)->first();

        if ($otp == null){
            return ApiResponse::error('404','Wrong OTP');
        }


        $customer = Customer::find($otp->customer_id);

        $customer->password = Hash::make($request->pin);
        $customer->save();

        $otp->delete();

        return ApiResponse::success($customer);

    }

    public function fcm_token(Request $request)
    {
        $request->validate([
            "fcm_token" => "required",
            "customer_id" => "required",
        ]);


        $customer_info = Customer::where('customer_id',$request->customer_id)->first();
        if($customer_info){
            Customer::where('customer_id',$request->customer_id)->update([
                "fcm_token" => $request->fcm_token,
            ]);
        }
//        $customer_info->fcm_token = $request->fcm_token;
//        $customer_info->save();

        $fcm_token = "Firebase token save sucessfully";
        return ApiResponse::success($fcm_token);

    }

    public function gs(){
        $gs = GeneralSetting::where('sp_id',auth()->guard('customer')->user()->sp_id)->first();

         return ApiResponse::success($gs);
    }

    public function gs1(){
        $gs = GeneralSetting::where('sp_id',auth()->guard('employee')->user()->sp_id)->first();

        return ApiResponse::success($gs);

    }

}
