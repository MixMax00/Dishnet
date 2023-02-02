<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\AdminPackage;
use App\Models\AreaLocation;
use App\Models\Customer;
use App\Models\ResponsibleArea;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function area(){
        $areas = ResponsibleArea::where('em_id',auth()->guard('employee')->user()->employee_id)->with('areas_name','areas_name.area_location','areas_name.area_location.customer','areas_name.area_location.customer.bill')->get();




        return ApiResponse::success($areas);
    }

    public function customers($area){
        $customers = Customer::with('package')->where('area_id',$area)->get();
        return ApiResponse::success($customers);

    }

    public function location($area){
        $customers = AreaLocation::where('area',$area)->select('area_location_name','area_location_id')->get();


    }

    public function customer_search(Request $request){
        $request->validate([
           'keyword'=>'required'
        ]);

        $customer = Customer::where('sp_id',auth()->guard('employee')->user()->sp_id)->where('customer_name','like','%'.$request->keyword.'%')->get();

        if ($customer->isEmpty()){
            $customer = Customer::where('sp_id',auth()->guard('employee')->user()->sp_id)->where('cell_number','like','%'.$request->keyword.'%')->get();
        }

            return ApiResponse::success($customer);




    }

    public function package()
    {
        $packages = AdminPackage::where('status', 1)->get();

        return ApiResponse::success($packages);
    }


}

