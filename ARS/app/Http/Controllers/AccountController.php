<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index(){
        return view('sign_in');
    }
    public function signIn(Request $request)
    {
        $messages = [
            "si_email.required" => "Email is required",
            "si_email.email" => "Email is not valid",
            "si_email.exists" => "Email doesn't exists",
            "si_password.required" => "Password is required",
            "si_password.min" => "Password must be at least 6 characters"
        ];
        $validator = Validator::make($request->all(), [
            'si_email' => 'required|email|exists:accounts,email',
            'si_password' => 'required|min:6'
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $username = $request->get('si_email');
            $password = $request->get('si_password');
            $check = Account::where('email', $username)->where('password', $password)->first();
            if ($check != null) {
               session(['id'=>$check->id,'email'=>$username,'password'=>$password]);
                return redirect()->action([HomeController::class,'index']);
            } else {
                return redirect()->back()->withInput($request->only('si_email'))->withErrors([
                    'approve' => 'Wrong password or this account not approved yet.']);
            }

        }
    }
}
