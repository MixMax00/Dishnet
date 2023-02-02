<?php

namespace App\Http\Controllers\backend;

use App\Models\Bill;
use App\Models\Package;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BillController extends Controller
{
    public function index(){
        return view('backend.bill.list');
    }

    public function add(){
        return view('backend.bill.bilL_collect');

    }

    public function getCustomer(Request $request)
    {
      $customer = Customer::where('customer_id',$request->customer_id)->first();
      return $customer;
    }

    public function getPackage(Request $request)
    {
        $package = Package::where('package_id',$request->package_id)->first();
        return $package;
    }

    public function store(Request $request)
    {

        $request->validate([
            'customer_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'total' => 'required',
        ]);

        $web_bill = new Bill();

        $web_bill->sp_id =  auth()->user()->sp_id;
        $web_bill->customer_id = $request->customer_id;
        $web_bill->month = $request->month;
        $web_bill->year = $request->year;
        $web_bill->service_charge = $request->service_charge;
        $web_bill->payment_date = Carbon::now()->format('Y-m-d');
        $web_bill->paid_amount = $request->total;
        $web_bill->payment_status = 1;
        $web_bill->save();


        $webBill = Bill::find($web_bill->id);
        $bill_id = auth()->user()->sp_id."bill".$webBill->id;
        $webBill->bill_id = $bill_id;
        $webBill->save();


        Toastr::success('Payment save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.bill');

    }

    public function paid($id){

        $bill = Bill::find($id);
        $bill-> payment_status = 1;
        $bill->save();
        Toastr::success('Payment Confirm', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function unpaid($id){
        $bill = Bill::find($id);
        $bill-> payment_status = 2;
        $bill->save();
        Toastr::error('Payment Reject', 'Danger', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
