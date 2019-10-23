<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Trip extends Model
{
    // super admin
    // =============================================
    public function allTripsForSuperAdmin()
    {
        $trips = DB::table('trips')
            ->selectRaw('trips.*,s.name as start_name, e.name as end_name, companies.*, transports.*')
            ->join('districts as s','s.id','=','trips.start_point')
            ->join('districts as e','e.id','=','trips.end_point')
            ->join('companies','companies.id','=','trips.company_id')
            ->join('transports','transports.id','=','trips.bus_id');
        return  $trips->get();
    }


    // company admins
    // =============================================
    public function allTrips($company_id)
    {
        $trips = DB::table('trips')
            ->selectRaw('trips.*,trips.id as t_id,s.name as start_name, e.name as end_name,users.*')
            ->join('districts as s','s.id','=','trips.start_point')
            ->join('districts as e','e.id','=','trips.end_point')
            ->join('users','users.id','=','trips.driver_id')
            ->where('company_id','=',$company_id)
            ->orderBy('trips.id','DESC');
        return  $trips->get();
    }

    public function allLocations()
    {
        $locations = DB::table('districts');
        return $locations->get();
    }

    public function allBuses()
    {
        $buses = DB::table('company_transport as ct')
            ->selectRaw('ct.id')
            ->join('companies as c','ct.company_id','=','c.id')
            ->join('transports as t','ct.transport_type_id','=','t.id')
            ->where('company_id','=',Auth::user()->companies[0]->id)
            ->where('t.transport_type','Bus')
            ->get();
        return $buses;
    }
    public function allDrivers()
    {
        $company_id= Auth::user()->companies[0]->id;
        $driver_details = DB::table('users')
                            ->join('role_user','users.id','role_user.user_id')
                            ->join('company_user','users.id','company_user.user_id')
                            ->where('company_user.company_id',$company_id)
                            ->where('role_user.role_id','3')
                            ->get();
        return $driver_details;
    }

    public function searchTrips($from,$to,$date)
    {
        $details = DB::table('trips')
                    ->join('companies','trips.company_id','companies.id')
                    ->join('company_transport','trips.bus_id','company_transport.id')
                    ->where('trips.start_point',$from)
                    ->where('trips.end_point',$to)
                    ->where('trips.date',$date)
                    ->get();

        return $details;
    }

}
