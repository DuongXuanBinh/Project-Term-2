<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class AccountController extends Controller
{

    public function index()
    {
        return view('sign_in');
    }
    public function admin(){
        if(session('email')&&session('password')&&session('check')){
            return view('controlcenter');
        }
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
            $role = $check->role;
//            dd($role);
            if ($check != null) {
                if ($role==1) {
                    session(['email' => $username, 'password' => $password, 'check' => $check]);
                    switch (session('page')) {
                        case 'home':
                            return redirect('/');
                        case 'manage':
                            return redirect('/booking-manage');
                        case 'choose_flight':
                            return redirect('/booking/passenger_index');
                    }
                }elseif ($role ==2 ){
                    session(['email' => $username, 'password' => $password, 'check' => $check]);
                    return redirect('/sign-in/admin');
                }
            }else {
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
        return redirect('/');
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
    public function checkSignUp(Request $request)
    {
        $query = $request->get('query');
        $name = $request->get('name');
        $data = Account::where($name, strtolower($query))->first();
        return $data;
    }
    public function signUp(Request $request){
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $phone = $request->phone;
        $credit_number = $request->credit_number;
        $sex = $request->sex;
        $password = $request->password;
        $address = $request->address;
        $dob = $request->dob;
        $email = $request->email;
        $skymile = 0;

        $user = new Account();
        $user->firstname = ucfirst($firstname);
        $user->lastname = ucfirst($lastname);
        $user->phone = $phone;
        $user->sex = $sex;
        $user->credit_number = $credit_number;
        $user->password = $password;
        $user->address = $address;
        $user->email =$email;
        $user->dob= $dob;
        $user->sky_miles = $skymile;
        $user->save();

        if(!$user->save()){
            return redirect('/sign-in')->with('signUp-notif','Something is wrong. Please try again.');
        }else
            return redirect('/sign-in')->with('signUp-notif','Welcome to Helvetic Home. Your account has been generated.');

    }
    public function forgot(Request $request){
        $email = $request->forgot_email;
        $code =  Str::upper(Str::random(4));
        Mail::send('mail.reset_password',compact('code'),function ($message) use ($email) {
            $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
            $message->to($email, $email);
            $message->subject('Reset Password');
        });
        return redirect('/sign-in')->with('code',$code)->with('email',$email);
    }
    public function forgotCheck(Request $request){
        $query = $request->get('query');
        $data = Account::where('email', strtolower($query))->first();
        return $data;
    }
    public function updatePassword(Request $request){
        $email = $request->forgot_email;
        $pass = $request->new_pass;

        $account = Account::where('email',$email)->first();
        $account->password = $pass;
        $account->save();
        return redirect('/sign-in')->with('signUp-notif','Your password has been changed successfully');
    }

}
