<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'collection'=>'required',
            'cost'=>'required',
            'total'=>'required',

            'date'=>'required',
            'explanation'=>'required',
        ]);

        $collect = new Collection();

        $collect->sp_id = auth()->guard('employee')->user()->sp_id;
        $collect->employee_id = auth()->guard('employee')->user()->employee_id;

        $collect->collection = $request->collection;
        $collect->cost = $request->cost;
        $collect->total = $request->total;
//        $collect->due = 0;
        $collect->date = $request->date;
        $collect->explanation = $request->explanation;

        $collect->save();

        return ApiResponse::success($collect);


    }
}
