<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ServiceAreaController extends Controller
{
    // SERVICE AREA LIST

    public function index()
    {
        return view('backend.serviceArea.index');
    }

    // SERVICE AREA CREATE
    public function create()
    {
        return view('backend.serviceArea.create');
    }

    public function store(Request $request)
    {
       // return $request->all();
        $request->validate([
            "area_name"   =>  "required",
            // "area_description"   =>  "required",
            "area_code"   =>  "required",
        ]);

        $areas = new Area();
        $areas->sp_id     = auth()->user()->sp_id;
        $areas->area_name  = $request->area_name;
        $areas->area_description = $request->area_description;
        $areas->area_code = $request->area_code;
        $areas->save();

        $area = Area::find($areas->id);
        $ar_id = auth()->user()->sp_id."ar".$area->id;
        $area = Area::find($areas->id);
        $area->area_id = $ar_id;
        $area->save();


        Toastr::success('Area save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.serviceArea.index');
    }

    public function edit($id)
    {
        $edit = Area::find($id);
        //return $edit;
        return view('backend.serviceArea.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $area = Area::find($request->id);
        $area->area_name  = $request->area_name;
        $area->area_description = $request->area_description;
        $area->area_code = $request->area_code;
        $area->save();

        Toastr::success('Area update successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.serviceArea.index');
    }

    public function status($id)
    {
        $area = Area::find($id);

        if($area->status == 1){
            $area->status = 0;
            $area->save();
            Toastr::success('Area inactive successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.serviceArea.index');
        }else{
            $area->status = 1;
            $area->save();
            Toastr::success('Area active successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.serviceArea.index');
        }
    }

    public function viewCustomer($area)
    {
       $customers =  Customer::where('sp_id', auth()->user()->sp_id)->where('area_id',$area)->get();

       return view('backend.serviceArea.showCustomer', compact('customers'));
    }
}
