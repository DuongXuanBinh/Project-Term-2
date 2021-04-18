<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Flight;
use App\Models\Order;
use App\Models\Ticket_details;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeIndex()
    {
        session(['page'=>'home']);
        session()->forget('from_transit_outbound_details');
        session()->forget('transit_to_outbound_details');
        session()->forget('from_transit_inbound_details');
        session()->forget('transit_to_inbound_details');
        session()->forget('outbound_details');
        session()->forget('return_details');
        return view('index');
    }

    public function flightIndex()
    {
        return view('Flight status');
    }

    public function flightStatus(Request $request)
    {
        $flightId = $request->get('flight_id');
        $date = strtotime($request->get('date'));
        $dateformat = date('Y/m/d', $date);
        $flight = Flight::where('id', $flightId)
            ->whereDate('departure_date', $dateformat)->first();
        if ($flight) {
            $route = $flight->route_direct;
            $ori_airport = $route->airports_origin;
            $arr_airport = $route->airports_arrival;
            $status = $flight->flight_status;
            return redirect('/flight-status')->withInput()->with('flight', $flight)
                ->with('ori_airport', $ori_airport)
                ->with('arr_airport', $arr_airport)
                ->with('status', $status);
        } else {
            $hide = 1;
            return redirect('/flight-status')->withInput()->with('flight', $flight)
                ->with('hide', $hide);
        }
    }

    public function bookingIndex()
    {
        session(['page'=>'manage']);
        return view('Booking Manage');
    }



    public function bookingManage(Request $request)
    {
        $code = $request->get('confirm-code');
        session(['code'=>$code]);
        $order = Order::where('id',strtoupper($code))->where('account_id',session('check')->id)->first();
        if (session('email') && session('password')) {
            if ($order) {
                $way = $order->flight_route;
                $tickets = $order->ticket_details;
                $passenger = array();
                $flight = array();
                $ori_airports = array();
                $arr_airports = array();
                $seat = array();
                for ($i = 0; $i < count($tickets); $i++) {
                    $passenger[$i] = $tickets[$i]->customer;
                    $flight[$i] = $tickets[$i]->flight;
                }
                $flights = array_values(array_unique($flight));
                $passengers = array_values(array_unique($passenger));
                usort($flights, function ($a, $b){
                    if(strtotime($a->departure_date)==strtotime($b->departure_date))
                        return 0;
                    return  (strtotime($a->departure_date)<strtotime($b->departure_date)) ? -1 : 1;
                });


                for($i=0;$i<count($flights);$i++){
                    $airport[$i] = $flights[$i]->route_direct;
                    $ori_airports[$i] = $airport[$i]->airports_origin;
                    $arr_airports[$i] = $airport[$i]->airports_arrival;
                }
                for($i=0;$i<count($passengers);$i++){
                    for($j=0;$j<count($flights);$j++){
                        $seat[$i][$j] = Ticket_details::select('seat_location')->where('flight_id','=',$flights[$j]->id)
                            ->where('passenger_id','=',$passengers[$i]->id)
                        ->first();
                    }
                }
//                dd($way);

                return back()->with('ori_airport', $ori_airports)
                    ->with('arr_airport', $arr_airports)
                    ->with('passengers', $passengers)
                    ->with('flights', $flights)
                    ->with('way', $way)
                    ->with('seat',$seat)
                    ->withInput();
            }
            else{
                $hide = 1;
                return back()->with('hide',$hide);
            }
        }
        else{
           return redirect('/sign-in');
        }
    }
    public function bookingDelete(Request $request){
        $code = $request->get('booking_code');
        $mile = Order::select('total_skymiles')->where('id',$code)->first();
        $order = Order::where('id',$code)->first();
        $account = Account::where('id',session('check')->id)->first();
        $account->sky_miles = $account->sky_miles - $mile->total_skymiles;
        $order->delete();
        $account->save();
        session()->forget('code');
        return redirect('/')->with('notification','Your booking has been cancelled. Please check your email');
    }

    public function bookingReschedule(Request $request){
        $code = $request->get('booking_code');
        $order = Order::where('id',strtoupper($code))->where('account_id',session('check')->id)->first();
        $way = $order->flight_route;
        $tickets = $order->ticket_details;
        $passenger = array();
        $flight = array();
        $ori_airports = array();
        $arr_airports = array();
        $seat = array();
        for ($i = 0; $i < count($tickets); $i++) {
            $passenger[$i] = $tickets[$i]->customer;
            $flight[$i] = $tickets[$i]->flight;
        }
        $flights = array_values(array_unique($flight));
        $passengers = array_values(array_unique($passenger));
        usort($flights, function ($a, $b){
            if(strtotime($a->departure_date)==strtotime($b->departure_date))
                return 0;
            return  (strtotime($a->departure_date)<strtotime($b->departure_date)) ? -1 : 1;
        });


        for($i=0;$i<count($flights);$i++){
            $airport[$i] = $flights[$i]->route_direct;
            $ori_airports[$i] = $airport[$i]->airports_origin;
            $arr_airports[$i] = $airport[$i]->airports_arrival;
        }
        for($i=0;$i<count($passengers);$i++){
            for($j=0;$j<count($flights);$j++){
                $seat[$i][$j] = Ticket_details::select('seat_location')->where('flight_id','=',$flights[$j]->id)
                    ->where('passenger_id','=',$passengers[$i]->id)
                    ->first();
            }
        }
        if(($way==1&&count($flights)==1)||($way==2&&count($flights)==2)){
            $ori = $ori_airports[0]->name;
            $arr = $arr_airports[0]->name;
        }
        elseif ($way==1&&count($flights)==2){
            $ori = $ori_airports[0]->name;
            $arr = $arr_airports[1]->name;
        }elseif ($way==2&&count($flights)>2){
            $ori = $ori_airports[0]->name;
            $i = count($flights)-1;
            $arr = $arr_airports[$i]->name;
        }
        if(!$request->new_arrival_date){
            $depart_date = $request->get('new_depart_date');
        }elseif ($request->new_arrival_date){
            $depart_date = $request->get('new_depart_date');
            $arr_date = $request->get('new_arrival_date');
        }
        $require = [
            'place_from'=>$ori,
            'place_to'=>$arr,
            'date_outbound'=>$depart_date,
            'date_return'=>$arr_date,
            'adult'=>count($passengers),
            'children'=>0,
            'senior'=>0
        ];
        $pass = new BookingController();
        $pass->create($require,$passengers);
    }

    public function sendEmail($order){

    }
}
