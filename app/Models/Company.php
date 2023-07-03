<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Company extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User','company_user','company_id')->withPivot('status');
    }
    public function transports()
    {
        return $this->belongsToMany('App\Models\Transport','transport_id','company_id')->withPivot('total_seats','registration_no');
    }

    public function allDrivers($company_id)
    {
        $driver_details = DB::table('users')
                            ->join('role_user','users.id','role_user.user_id')
                            ->join('company_user','users.id','company_user.user_id')
                            ->where('company_user.company_id',$company_id)
                            ->where('role_user.role_id','3')
                            ->get();
        return $driver_details;
    }

    public function userCount()
    {
        $company_id = Auth::user()->companies[0]->id;
        return CompanyUser::where('company_id',$company_id)->count();
    }

    public function transportCount()
    {
        $company_id = Auth::user()->companies[0]->id;
        return CompanyTransport::where('company_id',$company_id)->count();
    }

    public function tripsCount()
    {
        $company_id = Auth::user()->companies[0]->id;
        return Trip::where('company_id',$company_id)->count();
    }

    public function reservationsCount()
    {
        $company_id = Auth::user()->companies[0]->id;
        return Reservation::leftJoin('trips','reservations.trip_id','=','trips.id')
                            ->where(['trips.company_id'=>$company_id,'reservations.seat_status'=>'2'])->count();
    }

}
