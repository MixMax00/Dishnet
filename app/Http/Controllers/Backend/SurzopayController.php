<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SurzoPay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SurzopayController extends Controller
{
    public function index(){
        return view('backend.surzopay.surzo_pay');
    }

    public function store(Request $request)
    {

        $surzo_pay = SurzoPay::where('sp_id', auth()->user()->sp_id)->first();
        if($surzo_pay){
            SurzoPay::where('sp_id', auth()->user()->sp_id)->update([
                "merchant_username" => $request->merchant_username,
                "merchant_password" => $request->merchant_password,
                "engine_url" => $request->engine_url,
                "prefix" => $request->prefix,
            ]);
        }else{
            SurzoPay::create([
                "sp_id" => auth()->user()->sp_id,
                "merchant_username" => $request->merchant_username,
                "merchant_password" => $request->merchant_password,
                "engine_url" => $request->engine_url,
                "prefix" => $request->prefix,
            ]);
        }




        Toastr::success('Surzopay merchant update info successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
