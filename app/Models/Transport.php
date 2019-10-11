<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    public function companies()
    {
        return $this->belongsToMany('App\Models\Company','company_transport','company_id','transport_id')->withPivot('total_seats','registration_no');
    }
}
