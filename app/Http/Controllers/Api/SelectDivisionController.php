<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\HelperApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SelectDivisionController extends Controller
{
    public function division()
    {

        $division = User::where('role', 1)->where('status', 1)->groupBy('division')->get();

        return ApiResponse::success($division);
    }

    public function district($division_name)
    {
        $districts = User::where('role', 1)->where('status', 1)->where('division',$division_name)->groupBy('district')->get();
        return ApiResponse::success($districts);
    }

    public function upzila($district_name)
    {
        $upzila = User::where('role', 1)->where('status', 1)->where('district',$district_name)->groupBy('upzila')->get();
        return ApiResponse::success($upzila);
    }

    public function spList($upzila_name)
    {
        $users = User::with('service_area','service_area.area_location')->where('role', 1)->where('status', 1)->where('upzila',$upzila_name)->get();
        return ApiResponse::success($users);
    }





}
