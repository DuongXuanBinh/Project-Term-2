<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Route_direct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function delete_flight(Request $request){
        $flight_id = $request->flight_id;
        DB::beginTransaction();
        try {
            $flight = Flight::where('id','=',$flight_id)->first();

            foreach ($flight->ticket_details as $ticket){
                $ticket->customer->delete();
                $ticket->delete();
            }
            $flight->delete();

            DB::commit();
            $notification = 'Successful';
        }  catch (\Exception $e) {
            DB::rollBack();
            $notification = 'Somethings is wrong. Please try again.';

        }
        return $notification;
    }

    public function create_flight(Request $request){

        $last_flight = DB::table('flights')->orderBy('id', 'DESC')->first();
        $last_id = (int) str_replace('HV','',$last_flight->id);

        $origin_airport = Airport::where('name', '=', $request->place_from)->first();
        $arrival_airport = Airport::where('name', '=', $request->place_to)->first();
        $departure_time = Carbon::parse($request->departure_time)->format('Y-m-d H:i:s');

        if ($origin_airport != null && $arrival_airport!= null && $origin_airport != $arrival_airport){
            $route = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                ->where('arrival_airportid', '=', $arrival_airport->id)
                ->first();
            $add_hours = Carbon::parse($route->duration)->format('H');
            $add_minutes = Carbon::parse($route->duration)->format('i');
            $arrival_time = Carbon::parse($departure_time)->addHours($add_hours)->addMinutes($add_minutes)->format('Y-m-d H:i:s');
            dd($arrival_time);
        }


    }

    public function view_admin($session){


        session(['view'=>$session]);

        if ($session == 'account'){
            $accounts = Account::where('email','!=',session('email'))
                ->take(20)->get();

        }

        return view('controlcenter');
    }
}
