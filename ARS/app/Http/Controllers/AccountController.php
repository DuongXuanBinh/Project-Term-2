<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AccountController extends Controller
{
    public function index()
    {
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
            return back()->withInput()->withErrors($validator);
        } else {
            $username = $request->get('si_email');
            $password = $request->get('si_password');
            $check = Account::where('email', $username)->where('password', $password)->first();
            if ($check != null) {
                session(['email' => $username, 'password' => $password, 'check' => $check]);
                return redirect('/');
//                    ->action([HomeController::class, 'index']);
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'approve' => 'Wrong password or this account not approved yet.']);
            }
        }
    }

    public function showProfile()
    {
        $id = session('check')->id;


        $user = Account::find($id);
        return view('profile', compact('user'));
    }

    public function signOut()
    {
        session()->flush();
        return view('index');
    }

    public function updateProfile(Request $request)
    {
        $id = session('id');

        $account = Account::find($id);
        $account->firstname = $request->first_name;
        $account->lastname = $request->last_name;
        $account->phone = $request->phone;
        $account->credit_number = $request->credit_card;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->sex = $request->sex;
        $account->dob = $request->age;

        $account->save();
         return dd($account);
//        return redirect('/sign-in/profile');
    }
}
