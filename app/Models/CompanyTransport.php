<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Models\CompanyTransport;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyTransport extends Model
{
    protected $table = 'company_transport';

    public function busDetails()
    {
        $details = DB::table('company_transport')
            ->selectRaw('company_transport.*,company_transport.id as ct_id,t.ac_type as ac_type, tp.*, tp.id as trip_id, s.name as start_name, e.name as end_name')
            ->join('transports as t','company_transport.transport_type_id','t.id')
            ->join('trips as tp','company_transport.id','tp.bus_id')
            ->join('districts as s','s.id','=','tp.start_point')
            ->join('districts as e','e.id','=','tp.end_point')
            ->where('company_transport.company_id',Auth::user()->companies[0]->id)
            ->where('t.transport_type','Bus')
            ->get();

        return $details;

    }
}
