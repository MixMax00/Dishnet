<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Collection;
use App\Models\Cost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CollectionController extends Controller
{
    public function all()
    {
        return view('backend.collection.all');
    }

    public function create()
    {
        return view('backend.collection.add_collection');
    }

    public function getCollection(Request $request)
    {
        $bill = Bill::where('sp_id', auth()->user()->sp_id)->where('payment_date', $request->date)->where('em_id', $request->employee_id)->sum('paid_amount');
        return $bill;
    }

    public function store(Request $request)
    {
        $due = $request->collection - $request->cash_handover;

//        return $due;
        Collection::insert([
            "sp_id"  => auth()->user()->sp_id,
            "employee_id" => $request->employee_name,
            "collection"  => $request->collection,
            "cash_hand_over" => $request->cash_handover,
            "due"         => $due,
            "date"        => $request->date,
            "explanation"  => $request->explanation,

        ]);

        Toastr::success('Collection save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function edit($id)
    {
        $edit = Collection::find($id);
        return view('backend.collection.edit', compact('edit'));
    }

    public function update(Request $request)
    {

        $due_collection = Collection::find($request->id);
        $due_collection->due = $due_collection->due - $request->cash_handover;
        $due_collection->explanation = $request->explanation;
        $due_collection->updated_at = Carbon::now();
        $due_collection->save();

        Toastr::success('Collection updated successfully', 'Cost', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function accept($id){
        $collection = Collection::find($id);
        $collection->status = 1;
        $collection->save();
        Toastr::success('Collection request accepted successfully', 'Cost', ["positionClass" => "toast-top-right"]);
        return back();
    }




}
