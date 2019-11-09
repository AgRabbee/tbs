<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Reservation;

use App\User;
use App\Models\Role;
use App\Models\PaymentDetail;

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
        // validation
        $this->validate($request,[
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'phone' => 'required|string',
        ]);

        // create new user area

        $createUser = new User();
        $createUser->first_name = $request['f_name'];
        $createUser->last_name = $request['l_name'];
        $createUser->phone = $request['phone'];
    if ($request['email'] != '') {
        $createUser->email = $request['email'];
    }
        $createUser->user_status = 0;
        $createUser->save();
        $newUserID = $createUser->id;

        //payment details area

         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         Stripe\Charge::create ([
                "amount" => ($request['totalAmount']+$request['fee']) * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment from Ticket Booking System."
        ]);

        $stripe_token = $request['stripeToken'];
        $address = $request['address'];

        if ($stripe_token != '') {
            $stripePayment = new PaymentDetail();
            $stripePayment->user_id = $newUserID;
            $stripePayment->payment_status = 1;
            $stripePayment->payment_type = 0;
            $stripePayment->stripe_token = $stripe_token;
            $stripePayment->save();
            $newPaymentID = $stripePayment->id;
        }else {
            $caseOnDelivery = new PaymentDetail();
            $caseOnDelivery->user_id = $newUserID;
            $caseOnDelivery->payment_status = 0;
            $caseOnDelivery->payment_type = 1;
            $caseOnDelivery->user_address = $address;
            $caseOnDelivery->save();
            $newPaymentID = $caseOnDelivery->id;
        }

        //reservation area -- seat details update
        if ($stripe_token != '') {
            foreach ($request->seats as $seat) {
                $seatNo = rtrim($seat, ',');
                $updateReservation = Reservation::where('seat_number',$seatNo)->first();
                $updateReservation->payment_id = $newPaymentID;
                $updateReservation->seat_status = 2;
                $updateReservation->save();
            }
        }else {
            foreach ($request->seats as $seat) {
                $seatNo = rtrim($seat, ',');
                $updateReservation = Reservation::where('seat_number',$seatNo)->first();
                $updateReservation->payment_id = $newPaymentID;
                $updateReservation->seat_status = 1;
                $updateReservation->save();
            }
        }



       //
       //
       return redirect('/')->withSuccessMessage('Payment Successful');
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
