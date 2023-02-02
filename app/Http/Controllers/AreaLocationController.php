<?php

namespace App\Http\Controllers;

use App\Models\AreaLocation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AreaLocationController extends Controller
{
    public function index()
    {
        return view('backend.areaLocation.index');
    }

    public function create()
    {
        return view('backend.areaLocation.create');
    }

    public function store(Request $request)
    {
        $area_location = AreaLocation::create([
            "sp_id"  => auth()->user()->sp_id,
            "area"   => $request->area_name,
            "area_location_name" => $request->area_location_name,
            "description"    => $request->area_location_des,
            "area_location_code"    => $request->area_location_code,
        ]);

        $ar_loc = AreaLocation::find($area_location->id);
        $area_location_id = "area-loc-".$ar_loc->id;
        $ar_loc->area_location_id = $area_location_id;
        $ar_loc->save();


        Toastr::success('Area Location added successfully', 'Area Location', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.arealocation.index');


    }

    public function edit($id)
    {
        $edit = AreaLocation::find($id);
        return view('backend.areaLocation.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        AreaLocation::where('id',$request->id)->where('sp_id', auth()->user()->sp_id)->update([
            "area"   => $request->area_name,
            "area_location_name" => $request->area_location_name,
            "description"    => $request->area_location_des,
            "area_location_code"    => $request->area_location_code,
        ]);

        Toastr::success('Area Location update successfully', 'Area Location', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.arealocation.index');
    }

    public function status($id)
    {
       $areaLocation = AreaLocation::where('id',$id)->where('sp_id', auth()->user()->sp_id)->first();
       if ($areaLocation->status  == 1){
           $areaLocation->status = 0;
           $areaLocation->save();

           Toastr::success('Area Location inactive successfully', 'Area Location', ["positionClass" => "toast-top-right"]);
           return redirect()->route('admin.arealocation.index');

       }else{
           $areaLocation->status = 1;
           $areaLocation->save();

           Toastr::success('Area Location active successfully', 'Area Location', ["positionClass" => "toast-top-right"]);
           return redirect()->route('admin.arealocation.index');
       }

    }

}
