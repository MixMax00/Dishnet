<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customer_lists = Customer::where('isAccept', 1)->orderBy('id','DESC')->get();
        return view('backend.superAdmin.adminCustomer.index', compact('customer_lists'));
    }

    public function requestList()
    {
        return view('backend.superAdmin.adminCustomer.request_list');
    }
}
