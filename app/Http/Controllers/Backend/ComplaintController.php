<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('backend.complaint.list');
    }

    public function add()
    {
        return view('backend.complaint.add');
    }

    public function store(Request $request)
    {

        $customer = \App\Models\Customer::where('sp_id', auth()->user()->sp_id)->where('customer_id', $request->customer_id)->first();

        $area = \App\Models\Area::where('sp_id', auth()->user()->sp_id)->where('area_id', $customer->area_id)->first();



        $complain = new Complaint();
        $complain->sp_id = auth()->user()->sp_id;
        $complain->customer_id = $request->customer_id;
        $complain->area_id = $area->area_id;
        $complain->complain = $request->complain;
        $complain->save();

        Toastr::success('Complain save successfully', 'Title', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.complaint');


    }

    public function status($id)
    {
        $complain = Complaint::where('sp_id', auth()->user()->sp_id)->where('id',$id)->first();
        if ($complain->status == 0){
            $complain->status = 1;
            $complain->save();
            Toastr::success('Complain soloved successfully', 'Title', ["positionClass" => "toast-top-right"]);

            return redirect()->route('admin.complaint');
        }
    }

}
