<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->roles[0]->name == 'Super Admin') {
            return view('layouts.admin');
        }elseif (Auth::user()->roles[0]->name == 'Customer' || Auth::user()->roles[0]->name == 'Admin') {
            $c_name = Auth::user()->companies[0]->company_name;
            if ($c_name) {
                return view('layouts.public')->with('c_name', $c_name);
            }
            return view('layouts.public');
        }
        //return view('layouts.admin');

    }

    public function allUser(){
        $users = User::all();
        return view('admin.allUser')->with('users', $users);
    }
}
