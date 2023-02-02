<?php

namespace App\Http\Controllers\backend;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class PackageController extends Controller
{
    public function index(){
        return view('backend.package.list');
    }

    public function add(){
        return view('backend.package.add');
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

        $package  = new Package();
        $package->sp_id  = auth()->user()->sp_id;
        $package->package_name = $request->name;
        $package->package_description = $request->details;
        $package->price = $request->value;
        $package->save();

        $pkg = Package::find($package->id);
        $pkg_id = auth()->user()->sp_id."pk".$pkg->id;
        $pkg->package_id =  $pkg_id;
        $pkg->save();




        Toastr::success('Package save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.package');

    }

    public function edit($id)
    {
        $edit = Package::find($id);
        //return $edit;
        return view('backend.package.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $package = Package::find($request->id);
        $package->package_name = $request->name;
        $package->package_description = $request->details;
        $package->price = $request->value;
        $package->save();

        Toastr::success('Package update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.package');
    }

    public function status($id)
    {
        $package = Package::find($id);

        if($package->status == 1){
            $package->status = 0;
            $package->save();
            Toastr::success('Package inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.package');
        }else{
            $package->status = 1;
            $package->save();
            Toastr::success('Package active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.package');
        }
    }
}
