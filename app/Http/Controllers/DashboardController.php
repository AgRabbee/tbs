<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        }elseif (Auth::user()->roles[0]::where('name','Customer')->first()) {
            return redirect('/home');
        }
    }

    public function home()
    {
        if (session('success_message')) {
            Alert::info('Information!!', session('success_message'));
        }


        if (Auth::user()->roles[0]->name == 'Super Admin') {
            return redirect('/dashboard');
        }elseif (Auth::user()->roles[0]::where('name','Customer')->first()) {
            return view('welcome');
        }

    }

    public function allUser(){
        $users = User::all();
        return view('admin.allUser')->with('users', $users);
    }
}
