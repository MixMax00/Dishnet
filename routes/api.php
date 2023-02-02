<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CostController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\ComplainController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Payment\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, "login"]);

// user signup api route


// service provider routr
Route::get('user/division', [\App\Http\Controllers\Api\SelectDivisionController::class, 'division']);
Route::get('user/district/{division_name}', [\App\Http\Controllers\Api\SelectDivisionController::class, 'district']);
Route::get('user/upzila/{district_name}', [\App\Http\Controllers\Api\SelectDivisionController::class, 'upzila']);
Route::get('user/sp/{upzila_name}', [\App\Http\Controllers\Api\SelectDivisionController::class, 'spList']);
// user login api route


Route::group(["middleware" => ["auth:employee"]], function(){
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('profile/update', [AuthController::class, 'update_image']);
    Route::get('logout', [AuthController::class, 'logout']);


    Route::post('cost', [CostController::class, 'cost']);
    Route::get('cost/all-request', [CostController::class, 'all_request']);
    Route::get('cost/confirm', [CostController::class, 'confirmed']);
    Route::get('cost/reject', [CostController::class, 'reject']);
    Route::get('cost/{id}', [CostController::class, 'single_cost']);
    Route::post('cost/date', [CostController::class, 'date_wise']);


    Route::get('responsible/area',[EmployeeController::class,'area']);
//    Route::get('responsible/area',[EmployeeController::class,'area']);
    Route::get('customers/{area}',[EmployeeController::class,'customers']);

    Route::get('location/{area}',[EmployeeController::class,'location']);

    Route::post('customer/search',[EmployeeController::class,'customer_search']);


    Route::get('bill/details/{id}',[BillController::class,'bill_details']);
    Route::post('employee/bill/pay',[BillController::class,'bill_pay']);
    Route::get('employee/cash',[BillController::class,'cash']);

    Route::get('package-list', [EmployeeController::class, 'package']);

    Route::get('cash/due',[BillController::class,'due']);


    Route::post('collection',[CollectionController::class,'add']);

    Route::get('general-settings',[AuthController::class,'gs1']);




//    Route::post('complain/add',[ComplainController::class,'add']);

});



//Customer APP API

Route::prefix('customer')->group(function (){
    Route::post('login', [AuthController::class, "user_login"]);
    Route::post('singup', [AuthController::class, "create"]);
    Route::post('otp', [AuthController::class, "otp_check"]);
    Route::post('pin/set', [AuthController::class, "pin_set"]);
    Route::post('fcm-token',[AuthController::class, "fcm_token"]);


    Route::post('forgot/pin', [AuthController::class, "forgot_pin"]);
    Route::post('forgot/otp', [AuthController::class, "forgot_otp_check"]);
    Route::post('new/pin/set', [AuthController::class, "forgot_pin_set"]);

    Route::group(["middleware" => ["auth:customer"]], function(){
        Route::get('profile',[AuthController::class,'customer_profile']);
        Route::POST('update/profile',[AuthController::class,'customer_profile_update']);
        Route::POST('update/image',[AuthController::class,'customer_update_image']);
        Route::get('logout',[AuthController::class,'customer_logout']);
        Route::get('notification', [CustomerController::class, 'notification']);

        Route::post('sp/add',[CustomerController::class,'sp_add']);

        Route::get('bill',[CustomerController::class,'bill_list']);

        Route::get('bill/details/{id}',[BillController::class,'bill_details']);

        Route::post('payment',[PaymentController::class,'payment']);


        Route::post('complain/add',[ComplainController::class,'add']);

        Route::get('general-settings',[AuthController::class,'gs']);
    });


});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
