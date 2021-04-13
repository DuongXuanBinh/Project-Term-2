<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeIndex(){
        return view('index');
    }
    public function flightIndex(){
        return view('Flight status');
    }
    public function flightStatus(Request $request){
        $flightId= $request->get('flight_id');
        $date = strtotime($request->get('date'));
        $dateformat = date('Y/m/d',$date);
        $flight = Flight::find(strtoupper($flightId))
            ->whereDate('departure_date','=',$dateformat)->first();
        $route = $flight->route_directs;
        $ori_airport = $route->airports_origin;
        $arr_airport = $route->airports_arrival;
        $status = $flight->flight_statuses;
        return redirect('/flight-status')->withInput()->with('flight',$flight)
            ->with('ori_airport',$ori_airport)
            ->with('arr_airport',$arr_airport)
            ->with('status',$status);
    }
}
