<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

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

        if (!Auth::user()->companies->count()) {
            return view('company/index');
        }else{
            return redirect('/company/dashboard');
        }

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
            'tin_no' => 'required|integer',
            'company_image' => 'image|nullable|max:1999',
            'trade' => 'image|max:1999',
            'vat' => 'image|max:1999',
        ]);

        //handle company_image upload
        if ($request->hasFile('company_image')) {
            //get filename with the extension
            $fileNamewithExt = $request->file('company_image')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('company_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'_.'.$extension;
            //upload image
            $path = $request->file('company_image')->storeAs('public/company_image', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        //handle trade_image upload
        if ($request->hasFile('trade')) {
            //get filename with the extension
            $fileNamewithExt = $request->file('trade')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('trade')->getClientOriginalExtension();
            //file name to store
            $fileName1ToStore = $fileName.'_'.time().'_.'.$extension;
            //upload image
            $path = $request->file('trade')->storeAs('public/company_image', $fileName1ToStore);
        }

        //handle vat_image upload
        if ($request->hasFile('vat')) {
            //get filename with the extension
            $fileNamewithExt = $request->file('vat')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('vat')->getClientOriginalExtension();
            //file name to store
            $fileName2ToStore = $fileName.'_'.time().'_.'.$extension;
            //upload image
            $path = $request->file('vat')->storeAs('public/company_image', $fileName2ToStore);
        }

        $company = New Company;
        $company->company_name = $request['company_name'];
        $company->description = $request['company_description'];
        $company->address = $request['address'];
        $company->reg_no = $request['reg_no'];
        $company->tin_no = $request['tin_no'];
        $company->company_image = $fileNameToStore;
        $company->trade = $fileName1ToStore;
        $company->vat = $fileName2ToStore;
        $company->fees = 21;
        $company->company_status = 0;
        $company->save();

        $user_id = Auth::user()->id;
        $company->users()->attach($user_id, ['status' => 0]);

        //return redirect('/dashboard')->with('success','company created successfully');
        return redirect('/dashboard')->withSuccessMessage('Request for Company Registration Submitted Successfully');
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
        /*
            want to get the users who tried to register their own company except super admin..
            if any user try to register their company on the system a row will be added on 'company_user' table.
            there will be 4 types of users. 1. super admin, 2. company admin, 3. company driver, 4. customer

            Super Admin has an UI for displaying all the new company admins.
            company admins has also customer role.
        */


        //
        // if (session('success_message')) {
        //     Alert::success('Success!!', session('success_message'));
        // }

        //$c_admins = User::all()->except(['id' => '1']);

        $c_admins = DB::table('company_user')
                    ->join('users','users.id','=','company_user.user_id')
                    ->join('companies','companies.id','=','company_user.company_id')
                    ->get();

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

        $company = Company::find($company_id);
        $company->company_status = 1;
        $company->save();

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

        $company = Company::find($company_id);
        $company->company_status = 0;
        $company->save();

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


        $company = Company::find($company_id);
        $company->company_status = 2;
        $company->save();

        $adminRole = Role::where('name','Admin')->first();
        $u_id = $request['user_id'];
        $admin = User::find($u_id);
        $admin->roles()->detach($adminRole);

        return redirect('/dashboard/new/admins')->withSuccessMessage('Successfully Denied');
    }

    public function company_admin_panel()
    {
        if (Auth::user()->companies[0]->pivot->status == 1) {
            return view('manager.home');
        }elseif (Auth::user()->companies[0]->pivot->status == 0) {
            return redirect('/home')->withSuccessMessage('Your registration request is not accepted yet. Contact with System Admin.');
        }elseif (Auth::user()->companies[0]->pivot->status == 2) {
            return redirect('/home')->withSuccessMessage('Your registration request is Denied. Contact with System Admin.');
        }

    }
}
