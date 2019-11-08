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


}
