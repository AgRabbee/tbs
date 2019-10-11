<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

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

    public function allBuses()
    {
        // SELECT transports.id, transports.transport_type, companies.company_name FROM
        // company_transport, companies, transports WHERE
        // company_transport.company_id = companies.id AND
        // company_transport.transport_id = transports.id AND
        // companies.id = 1

        $buses = DB::table('company_transport as ct')
            ->selectRaw('t.id')
            ->join('companies as c','ct.company_id','=','c.id')
            ->join('transports as t','ct.transport_id','=','t.id')
            ->where('company_id','=',Auth::user()->companies[0]->id)
            ->where('t.transport_type','Bus')
            ->get();
        return $buses;
    }
}
