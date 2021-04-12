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
        $flight = Flight::where('id',strtoupper($flightId))
            ->whereDate('departure_date','=',$dateformat)
            ->first();
        return view('/flight-status',compact('flight'));
    }
}
