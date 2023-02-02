<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index(){
        $costs = Cost::where('sp_id',auth()->user()->sp_id)->orderBY('id',"DESC")->get();
//        dd($costs);
        return view('backend.cost.cost_list',[
            'costs'=>$costs
        ]);

    }
    public function accept($id){
        $cost = Cost::find($id);
        $cost->is_Accept = 2;
        $cost->save();
        Toastr::success('Cost request accepted successfully', 'Cost', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function reject($id){
        $cost = Cost::find($id);
        $cost->is_Accept = 1;
        $cost->save();
        Toastr::error('Cost request rejected successfully', 'Cost', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
