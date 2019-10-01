<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|string',
            'company_description' => 'required|string',
            'address' => 'required|string',
            'reg_no' => 'required|string',
            'company_image' => 'image|nullable|max:1999',
        ]);

        //handle images upload
        if ($request->hasFile('company_image')) {
            //get filename with the extension
            $fileNamewithExt = $request->file('company_image')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('company_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'_'.$extension;
            //upload image
            $path = $request->file('company_image')->storeAs('public/company_image', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $company = New Company;
        $company->company_name = $request['company_name'];
        $company->description = $request['company_description'];
        $company->address = $request['address'];
        $company->reg_no = $request['reg_no'];
        $company->company_image = $fileNameToStore;
        $company->fees = 21;
        $company->save();
        $user_id = Auth::user()->id;
        $status = 0;
        $company->users()->attach($user_id, ['status' => $status]);

        return redirect('/dashboard')->with('success','company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function company_admin()
    {
        $c_admins = User::all()->except(['id' => '1']);
        //$c_admins = User::find('2');
        //$c_admins = User::all()->where('id','!=','1')->get()->toArray();
        //dd($c_admins);

        if (session('success_message')) {
            Alert::success('Success!!', session('success_message'));
        }


        return view('admin.company_admin')->with('admin_details', $c_admins);
    }

    public function company_admin_active(Request $request)
    {
        $company_id = $request['company_id'];
        $company = Company::where('id', $company_id)->get();

        foreach ($company as $value) {
            $value->users[0]->pivot->status = 1;
            $value->users[0]->pivot->save();
        }

        $adminRole = Role::where('name','Admin')->first();
        $u_id = $request['user_id'];
        $admin = User::find($u_id);
        $admin->roles()->attach($adminRole);

        return redirect('/dashboard/new/admins')->withSuccessMessage('Successfully Activated');
    }

    public function company_admin_pause(Request $request)
    {
        $company_id = $request['company_id'];
        $company = Company::where('id', $company_id)->get();

        foreach ($company as $value) {
            $value->users[0]->pivot->status = 0;
            $value->users[0]->pivot->save();
        }
        return redirect('/dashboard/new/admins')->withSuccessMessage('Successfully Paused');
    }

    public function company_admin_deny(Request $request)
    {
        $company_id = $request['company_id'];
        $company = Company::where('id', $company_id)->get();

        foreach ($company as $value) {
            $value->users[0]->pivot->status = 2;
            $value->users[0]->pivot->save();
        }

        $adminRole = Role::where('name','Admin')->first();
        $u_id = $request['user_id'];
        $admin = User::find($u_id);
        $admin->roles()->detach($adminRole);

        return redirect('/dashboard/new/admins')->withSuccessMessage('Successfully Denied');
    }

    public function company_admin_panel($value='')
    {
        return view('manager.home');
    }
}
