<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // public function allocations($trip_id)
    // {
    //     $allocation = DB::table('reservations')
    //                     ->join('payment_details','payment_details.id','reservations.payment_id')
    //                     ->join('trips','trips.id','reservations.trip_id')
    //                     ->where('reservations.trip_id',$trip_id)
    //                     ->get();
    //
    //     return $allocation;
    // }


    public function allocations($trip_id)
    {
        $details = DB::table('reservations')
                    ->selectRaw('reservations.*')
                    ->join('payment_details','reservations.payment_id','payment_details.id')
                    ->join('trips','reservations.trip_id','trips.id')
                    ->where('reservations.trip_id',$trip_id)
                    ->get();

        return $details;
    }
}
