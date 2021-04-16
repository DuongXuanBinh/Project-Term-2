<?php

namespace App\Http\Controllers;

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
        if (session('email') && session('password')) {
            $order = Order::where('id',strtoupper($code))->first();
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
//                dd($passengers,$seat);

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
}
