<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->companies[0]->id;
        // $trips = Trip::where('company_id','=',$company_id)->get();
        $trips = new Trip();
        return view('company_admin.all_trips')->with('trips',$trips->allTrips($company_id));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = new Trip();
        $data = array(
            'locations' => $details->allLocations(),
            'buses' => $details->allBuses()
        );

        return view('company_admin.add_trips')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'date' => 'required|date',
            'time' => 'required|string',
            'starting_point' => 'required|integer',
            'end_point' => 'required|integer',
            'fare' => 'required|integer',
        ]);

        $trip = new Trip;
        $trip->company_id = Auth::user()->companies[0]->id;
        $trip->date = $request['date'];
        $trip->start_time = $request['time'];
        $trip->bus_id = $request['bus_id'];
        $trip->start_point = $request['starting_point'];
        $trip->end_point = $request['end_point'];
        $trip->fare = $request['fare'];
        $trip->save();

        return redirect()->back()->withSuccessMessage('Trip Added Successfully');


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


    public function allTrips()
    {
        $allTrips = new Trip();
        return view('admin.allTrips')->with('trips',$allTrips->allTripsForSuperAdmin());
    }
}
