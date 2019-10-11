<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'Super Admin') {
            return view('layouts.admin');
        }elseif (Auth::user()->roles[0]::where('name','Customer')->first()) {
            return redirect('/home');
        }
    }

    public function home()
    {
        if (Auth::user()->roles[0]->name == 'Super Admin') {
            return redirect('/dashboard');
        }elseif (Auth::user()->roles[0]::where('name','Customer')->first()) {
            return view('welcome');
        }

    }

    public function allUser(){
        $users = User::all()->except(['id'=>'1']);
        return view('admin.allUser')->with('users', $users);
    }

    public function userProfile()
    {
        return view('admin.adminProfile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'nid' =>'required|integer|max:99999999999'
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->nid = $request['nid'];
        $user->save();

        return redirect()->back()->withSuccessMessage('User Details updated successfully.');
    }

    public function passwordChange(Request $request)
    {
        $this->validate($request,[
            'c_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        $current_password = Auth::user()->password;
        if (Hash::check($request['c_password'],$current_password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request['password']);
            $user->save();
            return redirect('/profile')->withSuccessMessage('Password Changed Successfully.');
        }else {
            return redirect()->back()->withErrorMessage('Current Password Not matched.');
        }
    }

}
