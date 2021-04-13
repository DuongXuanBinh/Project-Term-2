<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'approve' => 'Wrong password or this account not approved yet.']);
            }
        }
    }
    public function signIn2(Request $request)
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
        $id = session('check')->id;
        $account = Account::find($id);
        $messages = [
            "required" => "The :attribute field is required",
            "unique" => "The :attribute is already exists",
            "phone.regex" => "Phone number must be 10 digits and start by 0",
            "credit_card.regex" => "Credit card number must be 10 digits",
            "sex.in" => 'Sex must be male or female'
        ];
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => ['required','regex:/^(0)[0-9]{9}$/',Rule::unique('accounts','phone')->ignore($account->id)],
            'credit_card' => ['required','regex:/^[0-9]{10}$/',Rule::unique('accounts','credit_number')->ignore($account->id)],
            'email' => ['required','email',Rule::unique('accounts','email')->ignore($account->id)],
            'address' => 'required',
            'sex' => ['required',Rule::in(['Male','Female'])],
            'age' => 'required',
        ], $messages);
        if ($validate->fails()) {

            return back()->withInput()->withErrors($validate);
        } else {
            $account->firstname = $request->first_name;
            $account->lastname = $request->last_name;
            $account->phone = $request->phone;
            $account->credit_number = $request->credit_card;
            $account->email = $request->email;
            $account->address = $request->address;
            $account->sex = $request->sex;
            $account->dob = $request->age;
            $account->save();
           return redirect()->back()->with('success','Your update has been recorded!');
        }
    }

    public function changePassword(Request $request){
        $id = session('check')->id;
        $account = Account::find($id);

        $validate = Validator::make($request->all(),
        [
            'password'=>['required',Rule::exists('accounts')->where('id',$id)],
            'new_password'=>'required|regex:/^[A-Za-z0-9]{6,}$/',
            'cnew_password'=>'required|same:new_password',
        ],$messages = [
            'required'=>'The :attribute is required',
            'password.exists'=>'The current :attribute is wrong',
            'new_password.regex'=>'Password accepts number, alphabet and is at least 6 characters',
            'cnew_password.same'=>'Confirmed password didn\'t match'
            ]);
        if($validate->fails())
            return back()->withErrors($validate);
        else{
            $account->password = $request->new_password;
            $account->save();
            return redirect()->back()->with('success','Your password has been changed');
        }
    }

    public function signUp(Request $request){
        $query = $request->get('query');
        $name = $request->get('name');

        $data = Account::where($name,strtolower($query))->get();

        return $data;

    }
}
