<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Company;
use Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $dashDetails = new User();
        $data = array(
            'userCount' => $dashDetails->count_company_users(),
            'companyCount' => $dashDetails->companyCount(),
            'customerCount' => $dashDetails->customers(),
            'tripsCount' => $dashDetails->tripsCount(),
        );
        return view('admin.adminHome')->with($data);
    }

    public function companyAdmin()
    {
        if (Auth::user()->companies[0]->pivot->status == 1) {
            $dashDetails = new Company();
            $data = array(
                'userCount' => $dashDetails->userCount(),
                'transportCount' => $dashDetails->transportCount(),
                'tripsCount' => $dashDetails->tripsCount(),
                'reservationsCount' => $dashDetails->reservationsCount(),
            );
            return view('company_admin.home')->with($data);

        }elseif (Auth::user()->companies[0]->pivot->status == 0) {
            return redirect('/')->withInfoMessage('Your registration request is not accepted yet. Contact with System Admin.');
        }elseif (Auth::user()->companies[0]->pivot->status == 2) {
            return redirect('/')->withInfoMessage('Your registration request is Denied. Contact with System Admin.');
        }
    }

    public function allUser(){
        // $users = User::all()->except(['id'=>'1']);
        //company employees
        $users = new User();
        $data = array(
            'users' => $users->company_users(),
            'customers' => $users->customers() 
        );
        // return view('admin.allUser')->with('users', $users);
        return view('admin.allUser')->with($data);
    }

    public function userProfile()
    {
        if (Auth::user()->roles[0]->name == 'Super Admin') {
            return view('admin.adminProfile');
        }elseif (Auth::user()->roles[1]->name == 'Admin') {
            return view('company_admin.adminProfile');
        }
        // elseif (Auth::user()->roles[0]->name == 'Customer') {
        //     return view('customer.customerProfile');
        // }
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
            return redirect()->back()->withSuccessMessage('Password Changed Successfully.');
        }else {
            return redirect()->back()->withErrorMessage('Current Password Not matched.');
        }
    }


    public function user_active(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::find($user_id);
        $user->user_status = 1;
        $user->save();

        $customerRole = Role::where('name','Customer')->first();
        $user->roles()->attach($customerRole);

        return redirect()->back()->withSuccessMessage('Successfully Activated');
    }

    public function user_pause(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::find($user_id);
        $user->user_status = 0;
        $user->save();

        $customerRole = Role::where('name','Customer')->first();
        $user->roles()->detach($customerRole);

        return redirect()->back()->withSuccessMessage('Successfully Paused');
    }

    public function user_deny(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::find($user_id);
        $user->user_status = 2;
        $user->save();

        if (count($user->roles)) {
            $customerRole = Role::where('name','Customer')->first();
            $user->roles()->detach($customerRole);
        }


        return redirect()->back()->withSuccessMessage('Successfully Denied');
    }

}
