<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Reservation;

use Stripe\Error\Card;
use Stripe;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function completePayment(Request $request)
    {
        dd($request->all());
       //  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       //  Stripe\Charge::create ([
       //         "amount" => ($request['totalAmount']+$request['fee']) * 100,
       //         "currency" => "usd",
       //         "source" => $request->stripeToken,
       //         "description" => "Payment from Ticket Booking System."
       // ]);
       //
       //
       // return redirect('/')->withSuccessMessage('Payment Successful');
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

        // dd($request->session());
        //
        if ($search_details->count()>0) {
            return view('bus.search_details')->with('search_details',$search_details);
        }else {
            return redirect()->back()->withInfoMessage('Trips not found. Try another destination.');
        }
    }


    public function seat_allocations(Request $request)
    {
        $trip_id = $request['trip_id'];

        // $seats = new Reservation();
        $seats = Reservation::where('trip_id',$trip_id)->get();
        // $details = $seats->allocations($trip_id);

        return response()->json(['success'=> $seats]);
    }

    public function prebooking(Request $request)
    {
        // $this->validate($request,[
        //     'seats[]'=>'required',
        //     'boarding_point'=>'required',
        // ]);
        // $seats = $request['seats'];
        // $total = $request['total'];


        $trip = new Trip();
        $data = array(
            'seats' => $request['seats'],
            'total' => $request['total'],
            'boarding_point' => $request['boarding_point'],
            'tripDetails' => $trip->tripDetails($request['trip_id']),

        );
        return view('bus.prebooking')->with($data);
    }
}
