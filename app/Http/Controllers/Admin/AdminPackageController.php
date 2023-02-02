<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index(){
        return view('backend.superAdmin.adminPackage.list');
    }

    public function add(){
        return view('backend.superAdmin.adminPackage.add');
    }

    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            "name"   =>  "required",
            "details"   =>  "required",
            "value"   =>  "required",
        ]);

        // $package_id = "pk_".round(5);

        $package  = new AdminPackage();
        $package->package_name = $request->name;
        $package->package_description = $request->details;
        $package->price = $request->value;
        $package->save();

        $pkg = AdminPackage::find($package->id);
        $pkg_id = "pk".$pkg->id;
        $pkg->package_id =  $pkg_id;
        $pkg->save();




        Toastr::success('Package save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('superadmin.package');

    }

    public function edit($id)
    {
        $edit = AdminPackage::find($id);
        //return $edit;
        return view('backend.superAdmin.adminPackage.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $package = AdminPackage::find($request->id);
        $package->package_name = $request->name;
        $package->package_description = $request->details;
        $package->price = $request->value;
        $package->save();

        Toastr::success('Package update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('superadmin.package');
    }

    public function status($id)
    {
        $package = AdminPackage::find($id);

        if($package->status == 1){
            $package->status = 0;
            $package->save();
            Toastr::success('Package inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('superadmin.package');
        }else{
            $package->status = 1;
            $package->save();
            Toastr::success('Package active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('superadmin.package');
        }
    }
}
