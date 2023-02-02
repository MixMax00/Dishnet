<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\District;
use App\Models\Thana;

class MerchantController extends Controller
{
    public function index(){
//        return '1';
        return view('backend.merchant.list');
    }

    public function add(){

        return view('backend.merchant.add');

    }

    public function get_district(Request $request)
    {
        $districts = District::where('division_id', $request->div_id)->get();
        $output =   '<option selected>Select</option>';
        foreach ($districts as $district) {
            echo $output = '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
    }


    public function get_thana(Request $request)
    {
        $thanas = Thana::where('district_id', $request->dis_id)->get();
        $output =   '<option selected>Select</option>';
        foreach ($thanas as $thana) {
            echo $output = '<option value="'.$thana->id.'">'.$thana->name.'</option>';
        }
    }

    public function store(Request $request)
    {
        //return $request->all();

        $request->validate([
            "name"            => "required",
            "owner_name"      => "required",
            "contact_number"  => "required",
            "email"           => "required|exists:users",
            "address"         => "required",
        ]);


        $div_name = Division::find($request->division);
        $dis_name = District::find($request->district);
        $upzila_name = Thana::find($request->upzila);

//        return $div_name;


        $merchant = new User();

        // $merchant->sp_id = $sp_id;
        $merchant->name = $request->name;
        $merchant->sp_representative = $request->owner_name;
        $merchant->sp_cell_number = $request->contact_number;
        $merchant->email    = $request->email;
        $merchant->division = $div_name->name;
        $merchant->district = $dis_name->name;
        $merchant->upzila   = $upzila_name->name;
        $merchant->address  = $request->address;
        $merchant->password = Hash::make('1234');
        $merchant->save();

        $sp = User::find($merchant->id);
        $sp_id = 'sp-'.$sp->id.rand(1,9);
        $sp->sp_id  = $sp_id;
        $sp->save();


        $genearl_setting = new GeneralSetting();
        $genearl_setting->sp_id = $sp_id;
        $genearl_setting->save();


        Toastr::success('Merchant save successfully', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->route('super.merchant');

    }

    public function edit($id)
    {
        $edit = User::find($id);
        return view('backend.merchant.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $sub_pro = User::find($request->id);
        $sub_pro->name = $request->name;
        $sub_pro->sp_representative = $request->owner_name;
        $sub_pro->sp_cell_number = $request->contact_number;
        $sub_pro->email = $request->email;
        $sub_pro->division = $request->division;
        $sub_pro->district = $request->district;
        $sub_pro->upzila   = $request->upzila;
        $sub_pro->address = $request->address;
        $sub_pro->save();

        Toastr::success('Merchant update successfully', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect()->route('super.merchant');

    }

    public function status($id)
    {
        $user = User::find($id);

        if($user->status == 1){
            $user->status = 0;
            $user->save();
            Toastr::success('Merchant inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('super.merchant');
        }else{
            $user->status = 1;
            $user->save();
            Toastr::success('Merchant active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('super.merchant');
        }
    }
}
