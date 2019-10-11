<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
