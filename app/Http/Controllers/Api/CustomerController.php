<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\NotificationCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function sp_add(Request $request){
        $request->validate([
            'sp_id'=>'required',
            'area_id'=>'required',
            'area_loc_id'=>'required',
        ]);

        $customer = Customer::find(auth()->guard('customer')->user()->id);
        $customer->sp_id = $request->sp_id;
        $customer->customer_id = $request->sp_id.'c'.$customer->id;
        $customer->area_id = $request->area_id;
        $customer->area_loc_id = $request->area_loc_id;
        $customer->save();

        return ApiResponse::success($customer);
    }

    public function bill_list(){
        $bills = Bill::where('customer_id',auth()->guard('customer')->user()->customer_id)->get();
        return ApiResponse::success($bills);
    }

    public function notification()
    {
        $notification = NotificationCustomer::where('sp_id', auth()->guard('customer')->user()->sp_id)->get();

        return ApiResponse::success($notification);
    }
}
