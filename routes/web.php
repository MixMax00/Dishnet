<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LangController;
use App\Http\Controllers\Backend\PackageController;

use App\Http\Controllers\Backend\CustomerController;
use \App\Http\Controllers\Backend\MerchantController;
use App\Http\Controllers\Backend\DashboardController;

use App\Http\Controllers\Backend\ServiceAreaController;
use App\Http\Controllers\Backend\RepresentativeController;
use App\Http\Controllers\Backend\BillController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\Backend\PasswordChangeController;
use App\Http\Controllers\Backend\ForgetPasswordController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\ComplaintController;
use App\Http\Controllers\AreaLocationController;

use App\Http\Controllers\Backend\CostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\SurzopayController;

use App\Http\Controllers\Admin\AdminBillCollectionController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminNotificationController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::prefix('forget')->group(function (){
     Route::get('email', [ForgetPasswordController::class, 'emailBlade'])->name('forget.email');
     Route::post('send-email', [ForgetPasswordController::class, 'checkEmail'])->name('forget.sendEmail');

 });

Route::middleware(['auth'])->group(function () {
    Route::middleware(['isAdminActive'])->group(function (){
        Route::middleware(['isSuperAdmin'])->group(function (){
            Route::prefix('superadmin')->group(function(){
                Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('super.dashboard');
                Route::get('/merchant', [MerchantController::class, 'index'])->name('super.merchant');
                Route::get('/merchant/add', [MerchantController::class, 'add'])->name('super.merchant.add');
                Route::post('/getdistrict', [MerchantController::class, 'get_district'])->name('getDistrict');
                Route::post('/getthana', [MerchantController::class, 'get_thana'])->name('getthana');
                Route::post('/merchant/store', [MerchantController::class, 'store'])->name('super.merchant.store');
                Route::get('edit/{id}',[MerchantController::class,'edit'])->name('admin.merchant.edit');
                Route::post('update',[MerchantController::class,'update'])->name('admin.merchant.update');
                Route::get('status/{id}',[MerchantController::class,'status'])->name('admin.merchant.status');

                Route::prefix('package')->group(function (){
                    Route::get('list',[AdminPackageController::class,'index'])->name('superadmin.package');
                    Route::get('add',[AdminPackageController::class,'add'])->name('superadmin.package.add');
                    Route::post('store',[AdminPackageController::class,'store'])->name('superadmin.package.store');
                    Route::get('edit/{id}',[AdminPackageController::class,'edit'])->name('superadmin.package.edit');
                    Route::post('update',[AdminPackageController::class,'update'])->name('superadmin.package.update');
                    Route::get('status/{id}',[AdminPackageController::class,'status'])->name('superadmin.package.status');
                });

                Route::prefix('collection')->group(function (){
                    Route::get('all', [AdminBillCollectionController::class, 'all'])->name('superadmin.collection.all');
                    Route::get('add-collection', [AdminBillCollectionController::class, 'create'])->name('superadmin.collection.add');
                    Route::get('accept/{id}',[AdminBillCollectionController::class,'accept'])->name('superadmin.collection.accept');
                    Route::post('getcollection', [AdminBillCollectionController::class,'getCollection'])->name('superadmin.collection.getcollection');
                    Route::post('add-collection', [AdminBillCollectionController::class, 'store'])->name('superadmin.collection.store');
                    Route::get('edit/{id}', [AdminBillCollectionController::class, 'edit'])->name('superadmin.collection.edit');
                    Route::post('update', [AdminBillCollectionController::class, 'update'])->name('superadmin.collection.update');

                });

                Route::prefix('customer')->group(function(){
                    Route::get('/list', [AdminCustomerController::class, 'index'])->name('superadmin.customer.index');
                    Route::get('status/{id}',[AdminCustomerController::class,'status'])->name('superadmin.customer.status');
                    Route::get('request', [AdminCustomerController::class, 'requestList'])->name('superadmin.request.cutomer');
                });

                Route::prefix('notification')->group(function (){
                    Route::get('customer-notification', [AdminNotificationController::class, 'getCustomerNotification'])->name('superadmin.notification.getCustomerNotification');
                    Route::get('send-customer-notification', [AdminNotificationController::class, 'getNotificationCustomer'])->name('superadmin.notification.getNotificationCustomer');
                    Route::post('send-notification-customer', [AdminNotificationController::class, 'sendNotificationrToCustomer'])->name('superadmin.notification.sendNotificationrToCustomer');
                });
            });
        });


        Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
        Route::get('profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile-update', [ProfileController::class, 'Update'])->name('profile.updated');


        Route::prefix('admin')->group(function(){
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
            Route::prefix('representative')->group(function(){
                Route::get('/list', [RepresentativeController::class, 'index'])->name('admin.representative.index');
                Route::get('/add', [RepresentativeController::class, 'create'])->name('admin.representative.create');
                Route::post('/store',[RepresentativeController::class, 'store'])->name('admin.representative.store');
                Route::get('edit/{id}',[RepresentativeController::class,'edit'])->name('admin.representative.edit');
                Route::post('update',[RepresentativeController::class,'update'])->name('admin.representative.update');
                Route::get('status/{id}',[RepresentativeController::class,'status'])->name('admin.representative.status');
            });

            Route::prefix('serviceArea')->group(function(){
                Route::get('/list', [ServiceAreaController::class, 'index'])->name('admin.serviceArea.index');
                Route::get('/add', [ServiceAreaController::class, 'create'])->name('admin.serviceArea.create');
                Route::post('/store',[ServiceAreaController::class, 'store'])->name('admin.serviceArea.store');
                Route::get('edit/{id}',[ServiceAreaController::class,'edit'])->name('admin.serviceArea.edit');
                Route::post('update',[ServiceAreaController::class,'update'])->name('admin.serviceArea.update');
                Route::get('status/{id}',[ServiceAreaController::class,'status'])->name('admin.serviceArea.status');
                Route::get('show-customer/{area_id}',[ServiceAreaController::class,'viewCustomer'])->name('admin.serviceArea.viewCustomer');

            });

            Route::prefix('arealocation')->group(function(){
                Route::get('/list', [AreaLocationController::class, 'index'])->name('admin.arealocation.index');
                Route::get('/add', [AreaLocationController::class, 'create'])->name('admin.arealocation.create');
                Route::post('/store',[AreaLocationController::class, 'store'])->name('admin.arealocation.store');
                Route::get('edit/{id}',[AreaLocationController::class,'edit'])->name('admin.arealocation.edit');
                Route::post('update',[AreaLocationController::class,'update'])->name('admin.arealocation.update');
                Route::get('status/{id}',[AreaLocationController::class,'status'])->name('admin.arealocation.status');
                Route::get('show-customer/{area_id}',[AreaLocationController::class,'viewCustomer'])->name('admin.arealocation.viewCustomer');


            });

            Route::prefix('customer')->group(function(){
                Route::get('/list', [CustomerController::class, 'index'])->name('admin.customer.index');
                Route::get('/add', [CustomerController::class, 'create'])->name('admin.customer.create');
                Route::post('/getLocArea', [CustomerController::class, 'getLocArea'])->name('admin.customer.getLocArea');
                Route::post('/store',[CustomerController::class, 'store'])->name('admin.customer.store');
                Route::get('edit/{id}',[CustomerController::class,'edit'])->name('admin.customer.edit');
                Route::post('update',[CustomerController::class,'update'])->name('admin.customer.update');
                Route::get('status/{id}',[CustomerController::class,'status'])->name('admin.customer.status');
                Route::get('request', [CustomerController::class, 'requestList'])->name('admin.request.cutomer');
                Route::post('isAccept', [CustomerController::class, 'isAccept'])->name('admin.cutomer.isAccept');
            });

            Route::prefix('package')->group(function (){
                Route::get('list',[PackageController::class,'index'])->name('admin.package');
                Route::get('add',[PackageController::class,'add'])->name('admin.package.add');
                Route::post('store',[PackageController::class,'store'])->name('admin.package.store');
                Route::get('edit/{id}',[PackageController::class,'edit'])->name('admin.package.edit');
                Route::post('update',[PackageController::class,'update'])->name('admin.package.update');
                Route::get('status/{id}',[PackageController::class,'status'])->name('admin.package.status');
            });

            Route::prefix('bill')->group(function (){
                Route::get('list',[BillController::class,'index'])->name('admin.bill');
                Route::get('collect',[BillController::class,'add'])->name('admin.bill.collect');
                Route::post('get-customer',[BillController::class,'getCustomer'])->name('admin.bill.getcustomer');
                Route::post('get-package',[BillController::class,'getPackage'])->name('admin.bill.getpackage');
                Route::post('store',[BillController::class,'store'])->name('admin.bill.store');
                Route::get('paid/{id}',[BillController::class,'paid'])->name('admin.bill.paid');
                Route::get('unpaid/{id}',[BillController::class,'unpaid'])->name('admin.bill.unpaid');

            });

            Route::prefix('cost')->group(function (){
                Route::get('list',[CostController::class,'index'])->name('admin.cost');
                Route::get('cost/request/accept/{id}',[CostController::class,'accept'])->name('admin.cost.accept');
                Route::get('cost/request/reject/{id}',[CostController::class,'reject'])->name('admin.cost.reject');
//            Route::get('collect',[CostController::class,'add'])->name('admin.bill.collect');


            });

            Route::prefix('collection')->group(function (){
                Route::get('all', [CollectionController::class, 'all'])->name('admin.collection.all');
                Route::get('add-collection', [CollectionController::class, 'create'])->name('admin.collection.add');
                Route::get('accept/{id}',[CollectionController::class,'accept'])->name('admin.collection.accept');
                Route::post('getcollection', [CollectionController::class,'getCollection'])->name('admin.collection.getcollection');
                Route::post('add-collection', [CollectionController::class, 'store'])->name('admin.collection.store');
                Route::get('edit/{id}', [CollectionController::class, 'edit'])->name('admin.collection.edit');
                Route::post('update', [CollectionController::class, 'update'])->name('admin.collection.update');

            });

            Route::prefix('complaint')->group(function (){
                Route::get('list',[ComplaintController::class,'index'])->name('admin.complaint');
                Route::get('add',[ComplaintController::class,'add'])->name('admin.complaint.add');
                Route::post('store',[ComplaintController::class,'store'])->name('admin.complaint.store');
                Route::get('status/{id}',[ComplaintController::class,'status'])->name('admin.complaint.status');
            });

            Route::prefix('setting')->group(function (){
                Route::get('general-setting', [GeneralSettingController::class, 'generalSetting'])->name('admin.setting.generalSetting');
                Route::post('general-store', [GeneralSettingController::class, 'update'])->name('admin.setting.generalSetting.update');
            });

            Route::prefix('password')->group(function (){
                Route::get('index', [PasswordChangeController::class, 'index'])->name('admin.password.index');
                Route::post('changePassword', [PasswordChangeController::class, 'changePassword'])->name('admin.password.changePassword');
            });

            Route::prefix('notification')->group(function (){
                Route::get('customer-notification', [NotificationController::class, 'getCustomerNotification'])->name('admin.notification.getCustomerNotification');
                Route::get('send-customer-notification', [NotificationController::class, 'getNotificationCustomer'])->name('admin.notification.getNotificationCustomer');
                Route::post('send-notification-customer', [NotificationController::class, 'sendNotificationrToCustomer'])->name('admin.notification.sendNotificationrToCustomer');
            });

            Route::prefix('surzopay')->group(function(){
                Route::get('index',[SurzopayController::class, 'index'])->name('admin.surzopay.index');
                Route::post('store',[SurzopayController::class, 'store'])->name('admin.surzopay.store');
            });
        });
    });
});

Route::get('payment/response',[\App\Http\Controllers\Payment\PaymentController::class,'payment_response']);
Route::get('payment/success',[\App\Http\Controllers\Payment\PaymentController::class,'payment_success'])->name('payment_success');
Route::get('payment/error',[\App\Http\Controllers\Payment\PaymentController::class,'payment_error'])->name('payment_error');
Route::get('payment/cancel',[\App\Http\Controllers\Payment\PaymentController::class,'payment_cancel'])->name('payment_cancel');

//Route::get('payment',[\App\Http\Controllers\Payment\PaymentController::class,'payment']);
