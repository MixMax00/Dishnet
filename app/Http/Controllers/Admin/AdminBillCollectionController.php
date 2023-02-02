<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use App\Models\Bill;
use App\Models\AdminBillCollection;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminBillCollectionController extends Controller
{
    public function all()
    {
        return view('backend.superadmin.billCollection.all');
    }

    public function getCollection(Request $request)
    {


        $bill = AdminPackage::where('id', $request->package_id)->first();
        return $bill->price;
    }


    public function create()
    {
        return view('backend.superadmin.billCollection.add_collection');
    }

    public function store(Request $request)
    {
        $due = $request->collection - $request->cash_handover;

//        return $due;
        AdminBillCollection::insert([
            "sp_id"  => $request->sp_id,
            "package_id" => $request->package_name,
            "collection"  => $request->collection,
            "cash_handover" => $request->cash_handover,
            "due"         => $due,
            "date"        => $request->date,
            "explanation"  => $request->explanation,

        ]);

        Toastr::success('Collection save successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }



}
