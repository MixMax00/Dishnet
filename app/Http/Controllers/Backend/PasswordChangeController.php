<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function index(){
//        $user =  User::where('sp_id', auth()->user()->sp_id)->first();
        return view('backend.Settings.changePassword.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        $user =  User::where('sp_id', auth()->user()->sp_id)->first();

        if ($user){

            if (Hash::check($request->old_password, $user->password)){
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password change successfully', 'Success', ["positionClass" => "toast-top-right"]);
                return back();
            }else{
                Toastr::success('Old password does not match. please give valid password', 'Success', ["positionClass" => "toast-top-right"]);
                return back();
            }

        }else{
            Toastr::success('You are not valid user. You have does not change password.', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }

}
