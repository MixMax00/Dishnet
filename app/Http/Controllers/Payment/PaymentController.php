<?php

namespace App\Http\Controllers\Payment;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
//use Shurjomukhi\ShurjopayLaravelPackage8\Http\Controllers\Shurjopay;



class PaymentController extends Controller
{
    public function payment(Request $request){
        $request->validate([
            'month'=>'required',
            'year'=>'required'

        ]);
        $customer_id = auth()->guard('customer')->user()->customer_id;
//        return $customer_id;
        $customer = Customer::with('package')->where('customer_id',$customer_id)->first();
        $sp = User::where('sp_id',$customer->sp_id)->first();

//        return $customer;

        $info = array(
            'currency' => "BDT",
            'amount' => $customer->package->price,
    'order_id' => $customer->customer_id,
    'discount_amount' => 0,
    'disc_percent' => 0,
    'client_ip' => "0",
    'customer_name' => $customer->customer_name,
    'customer_phone' => $customer->cell_number,
    'email' => $customer->email,
    'customer_address' => $customer->address,
    'customer_city' => $sp->upzila,
    'customer_state' => $sp->district,
    'customer_postcode' =>"N/A",
    'customer_country' => "Bangladesh",
           ' value1'=>'',
                  'value2'=>$request->year,
                  'value3' =>$request->month,
                  'value4' =>auth()->guard('customer')->user()->sp_id
);


        $shurjopay_service = new ShurjopayController();


        $response = $shurjopay_service->checkout($info);

//        return $response;

        $data = ['payment_url'=>$response];
        return ApiResponse::success($data);
    }

    public function payment_response(Request $request){
        $order_id=$request->order_id;
        $shurjopay_service = new ShurjopayController();

        $pay = $shurjopay_service->verify($order_id);
        $pay_data = json_decode($pay);
//      return  $pay_data;

        if ($pay_data[0]->sp_code == 1000) {
//            return $pay_data[0]->customer_order_id;
            $bill = Bill::where('customer_id',$pay_data[0]->customer_order_id)->where('month',$pay_data[0]->value3)->where('year',$pay_data[0]->value2)->first();
//            return $bill;

            $bill ->payment_date = Carbon::now()->format('Y-m-d');
            $bill ->payment_status = 1;
            $bill ->payment_method = 1;
            $bill->save();

            return redirect()->route('payment_success');

        }else{
            return redirect()->route('payment_error');
        }
    }

    public function payment_success (){

    }
    public function payment_error(){

    }
    public function payment_cancel(){

    }
}
