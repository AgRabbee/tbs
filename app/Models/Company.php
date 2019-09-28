<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
        //return $this->belongsToMany('App\User');
        return $this->belongsToMany('App\User','company_user','company_id','user_id');
    }
}
