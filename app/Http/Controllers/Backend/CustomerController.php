<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\AreaLocation;
use App\Models\Customer;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
   // CUSTOMER  LIST

   public function index()
   {
       return view('backend.customer.index');
   }

   // CUSTOMER  CREATE
   public function create()
   {
       return view('backend.customer.create');
   }

    public function getLocArea(Request $request)
    {
        $area_locs = AreaLocation::where('area', $request->area_id)->get();
        $output =   '<option selected>Select</option>';
        foreach ($area_locs as $loc_area) {
            echo $output = '<option value="'.$loc_area->area_location_id.'">'.$loc_area->area_location_name.'</option>';
        }
    }

   public function store(Request $request)
   {
        // return $request->all();

        $request->validate([
            "customer_name"  => "required",
            "customer_mobial_number" => "required",
            "address" => "required",
            "area" => "required",
            "packge_name" => "required",
        ]);

        $customer = Customer::create([
            "sp_id"  => auth()->user()->sp_id,
            "customer_name" => $request->customer_name,
            "cell_number" => $request->customer_mobial_number,
            "password"   => Hash::make("dishnet"),
            "address" => $request->address,
            "area_id" => $request->area,
            "area_loc_id" => $request->area_location,
            "package_id" => $request->packge_name,
            "isAccept" => 1,
        ]);


        $customer_id = auth()->user()->sp_id."c".$customer->id;
        $customer->customer_id = $customer_id;
        $customer->save();

        Toastr::success('Customer save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.customer.index');
   }

   public function edit($id)
   {
        $edit = Customer::find($id);
        return view('backend.customer.edit', compact('edit'));
   }

   public function update(Request $request)
   {
        Customer::where('id',$request->id)->update([
            "customer_name" => $request->customer_name,
            "cell_number" => $request->customer_mobial_number,
            "address" => $request->address,
            "area_id" => $request->area,
            "area_loc_id" => $request->area_location,
            "package_id" => $request->packge_name,
        ]);

        Toastr::success('Customer update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.customer.index');
   }

   public function status($id)
    {
        $customer = Customer::find($id);

        if($customer->status == 1){
            $customer->status = 0;
            $customer->save();
            Toastr::success('Customer inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.customer.index');
        }else{
            $customer->status = 1;
            $customer->save();
            Toastr::success('Customer active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.customer.index');
        }
    }

    public function requestList()
    {
        return view('backend.customer.request_list');
    }

    public function isAccept(Request $request)
    {

        $request->validate([
            "id"  => "required",
            "packge_name" => "required",
        ]);

        $customer = Customer::find($request->id);

        if($customer->isAccept == 1){
            $customer->isAccept = 0;
            $customer->save();
            Toastr::success('Customer inaccept successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.customer.index');
        }else{
            $customer->isAccept = 1;
            $customer->package_id = $request->packge_name;
            $customer->save();
            Toastr::success('Customer accept successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.customer.index');
        }
    }
}
