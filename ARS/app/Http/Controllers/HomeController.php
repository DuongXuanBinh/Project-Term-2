<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Order;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeIndex()
    {
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
            $ori_airport = $route->airports_origins;
            $arr_airport = $route->airports_arrivals;
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
        return view('Booking Manage');
    }

    public function bookingManage(Request $request)
    {
        if (session('email') && session('password')) {
            $code = $request->get('confirm-code');
            $order = Order::findOrFail(strtoupper($code));
            if ($order) {
                $way = $order->flight_route;
                $tickets = $order->ticket_details;
                $passenger = array();
                $flight = array();
                for ($i = 0; $i < count($tickets); $i++) {
                    $passenger[$i] = $tickets[$i]->customers;
                    $flight[$i] = $tickets[$i]->flights;
                }
                $flights = array_unique($flight);
                $passengers = array_unique($passenger);
                dd($way);
//                return redirect('/booking-manage')->with('ticket', $tickets)
//                    ->with('passenger', $passengers)
//                    ->with('flight', $flights)
//                    ->with('way', $way)
//                    ->withInput();

//            }
//            else {
//                $hide = 1;
//                return redirect('/booking-manage');
////            }
//        }else{
//            return redirect('booking-manage/search/register');
//        }
            }
        }
    }
}
