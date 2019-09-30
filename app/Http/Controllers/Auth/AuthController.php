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
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            //return redirect('/dashboard');
            return redirect()->intended('/dashboard');
        }
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
        $user->save();
        $user->roles()->attach(Role::where('name','Customer')->first());
        Auth::login($user);
        return redirect('/dashboard');
    }
}
