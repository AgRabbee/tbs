<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\Company;

class AuthController extends Controller
{
    // signin section
    // ==============================================
    public function getSignin()
    {
        return view('auth/signin');
    }

    public function Signin(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'],'user_status'=>0])) {
            session()->flash('type','danger');
            session()->flash('message','User registration is not accepted yet. Contact with System admin');
            return redirect()->back();
        }elseif (Auth::attempt(['email' => $request['email'], 'password' => $request['password'],'user_status'=>1])) {

            if (Auth::user()->roles[0]->name == 'Super Admin') {
                return redirect('/dashboard');
            }elseif (Auth::user()->roles[0]->name == 'Customer') {
                return redirect('/');
            }elseif (Auth::user()->roles[1]->name == 'Admin') {
                return redirect('/company/dashboard');
            }
        }
        session()->flash('type','danger');
        session()->flash('message','Invalid email or password');
        return redirect()->back();
    }



    // signup section
    // ============================================

    public function getSignup()
    {
        return view('auth/signup');
    }

    public function Signup(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string',
            'nid' => 'required|integer|max:99999999999',
        ]);
        $user = new User;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->phone = $request['phone'];
        $user->nid = $request['nid'];
        $user->user_status = 0;
        $user->save();
        // $user->roles()->attach(Role::where('name','Customer')->first());
        // Auth::login($user);
        session()->flash('type','success');
        session()->flash('message','Registration Complete Successfully.');
        return redirect('/signin');
    }
}
