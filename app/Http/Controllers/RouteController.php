<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Trip;
use Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->companies[0]->id;
        // $trips = Trip::all()->where('company_id','=',$company_id);
        $trips = DB::table('trips')
                ->join('districts as s','s.id','=','trips.start_point')
                ->join('districts as e','e.id','=','trips.end_point')
                ->where('company_id','=',$company_id)
                ->get();

        return view('company_admin.all_trips')->with('trips',$trips);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = DB::table('districts')
                    ->get();
        return view('company_admin.add_trips')->with('locations', $locations);
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
}
