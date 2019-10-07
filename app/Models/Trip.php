<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trip extends Model
{
    public function allTrips($company_id)
    {
        $trips = DB::table('trips')
            ->selectRaw('trips.*,s.name as start_name, e.name as end_name')
            ->join('districts as s','s.id','=','trips.start_point')
            ->join('districts as e','e.id','=','trips.end_point')
            ->where('company_id','=',$company_id);
        return  $trips->get();
    }
    public function allLocations()
    {
        $locations = DB::table('districts');
        return $locations->get();
    }
}
