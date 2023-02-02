<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;

class ForgetPasswordController extends Controller
{

    public function emailBlade()
    {
        return view('backend.forgetPassword.email');
    }
    public function checkEmail(Request $request)
    {
        $request->validate([
            "email" => "required|exists:App\Models\User,email",
        ]);

        $exist = User::where('email', '=', $request->email)->exists();

        if ($exist) {
            $user = User::where('email',$request->email)->first();

            return $user;
        } else {
            Toastr::error('U have does not  registerd.', 'Title', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

}
