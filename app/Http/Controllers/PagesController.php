<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bus()
    {
        $trips_info = new Trip();
        return view('bus.index')->with('tripsInfo',$trips_info->allLocations());
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'date_of_journey' => 'required',
        ]);

        $from = $request['from'];
        $to = $request['to'];
        $date = $request['date_of_journey'];

        $search_trips = new Trip();
        $search_details = $search_trips->searchTrips($from,$to,$date);
        // $search_details = Trip::where('start_point',$from)
        //                     ->where('end_point',$to)
        //                     ->where('date',$date)
        //                     ->get();
        if ($search_details->count()>0) {
            return view('bus.search_details')->with('search_details',$search_details);
        }else {
            return redirect()->back()->withInfoMessage('Trips not found. Try another destination.');
        }
    }
}
