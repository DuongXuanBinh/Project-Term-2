<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Airport;
use App\Models\Classes;
use App\Models\Customer;
use App\Models\Customer_type;
use App\Models\Flight;
use App\Models\Flight_status;
use App\Models\Order;
use App\Models\Plane;
use App\Models\Plane_type;
use App\Models\Route_direct;
use App\Models\Seat;
use App\Models\Ticket_details;
use App\Models\Ticket_price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function delete_flight($id){
        $flight_id = $id;
        DB::beginTransaction();
        try {
            $flight = Flight::where('id','=',$flight_id)->first();

            foreach ($flight->ticket_details as $ticket){
                if ($ticket->customer != null){
                    $ticket->customer->delete();
                }

                $ticket->delete();
            }
            $flight->delete();

            DB::commit();
            $notification = 'Delete successful';
        }  catch (\Exception $e) {
            DB::rollBack();
            $notification = 'Somethings is wrong. Please try again.';

        }
        return redirect()->back()->with('notification',$notification);
    }

    public function create_flight(Request $request){
        session()->forget('notification');
        $last_flight = DB::table('flights')->orderBy('id', 'DESC')->first();
        $last_id = (int) str_replace('HV','',$last_flight->id);
        $last_id++;
        $flight_id = 'HV'.$last_id;
        $notification = '';
        $origin_airport = Airport::where('name', '=', $request->place_from)->first();
        $arrival_airport = Airport::where('name', '=', $request->place_to)->first();
        $departure_time = Carbon::parse($request->departure_time)->format('Y-m-d H:i:s');
        $status = 0;
        if ($request->status == 'As scheduled'){
            $status = 1;
        }
        else $status = 0;
        $plane_id = 0;
        switch ($request->plane){
            case 'MB111' :
                $plane_id = 1;
                break;
            case 'MB112' :
                $plane_id = 2;
                break;
            case 'MB113' :
                $plane_id = 3;
                break;
            default :
                $plane_id = 0;
                break;
        }

        if ($origin_airport != null && $arrival_airport!= null && $origin_airport != $arrival_airport
            && $status == 1 && $plane_id != 0 ){
            $route = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                ->where('arrival_airportid', '=', $arrival_airport->id)
                ->first();
            $add_hours = Carbon::parse($route->duration)->format('H');
            $add_minutes = Carbon::parse($route->duration)->format('i');
            $arrival_time = Carbon::parse($departure_time)->addHours($add_hours)->addMinutes($add_minutes)->format('Y-m-d H:i:s');
            $all_flights = Flight::all();
            $x = true;
            foreach ($all_flights as $flight){
                if (Carbon::parse($departure_time)->gt(Carbon::parse($flight->departure_date)) &&
                    Carbon::parse($departure_time)->lt(Carbon::parse($flight->arrival_date)) &&
                     $plane_id == $flight->planeid){
                        $x = false;
                        break;
                }
            }
            if ($x == true){
                $new_flight = new Flight();
                $new_flight->id = $flight_id;
                $new_flight->route_id = $route->id;
                $new_flight->departure_date = $departure_time;
                $new_flight->arrival_date =  $arrival_time;
                $new_flight->statusid = $status;
                $new_flight->planeid = $plane_id;
                $new_flight->save();
                $notification = 'Add new flight successfully';
            }
            else{
                $notification = 'Plane is used at that time ';
            }
        }
        else{
            $notification = 'Invalid information to add new Flight! ';
        }
        session(['notification'=>$notification]);
        return redirect()->back();
    }

    public function update_flight(Request $request){
        $departure_time = Carbon::parse($request->departure_time)->format('Y-m-d H:i:s');
        $flight_id = $request->flight_id;
        $route = Route_direct::where('id','=',$request->route)->first();
        $add_hours = Carbon::parse($route->duration)->format('H');
        $add_minutes = Carbon::parse($route->duration)->format('i');
        $arrival_time = Carbon::parse($departure_time)->addHours($add_hours)->addMinutes($add_minutes)->format('Y-m-d H:i:s');
        $status_id = Flight_status::where('name','=',$request->status)->first()->id;
        $plane_id = Plane::where('name','=',$request->plane)->first()->id;
        $flight = Flight::where('id','=',$flight_id)->first();
        $flight->route_id = $request->route;
        $flight->departure_date =  $departure_time;
        $flight->arrival_date = $arrival_time;
        $flight->statusid = $status_id;
        $flight->planeid = $plane_id;
        $flight->save();
        $noti = 'Update successfully';

        return redirect()->back()->with('notification',$noti);

    }

    public function view_admin($session){

        session(['view'=>$session]);

        if ($session == 'account'){
            $accounts = Account::where('email','!=',session('email'))
                ->take(20)->get();
            $customers = Customer::all();
            $customer_types = Customer_type::all();
            return view('controlcenter',
                compact([
                    'accounts','customers','customer_types'
                ]));
        }
        elseif ($session == 'flight'){

            $flights = Flight::paginate(10);
            $routes = Route_direct::all();
            $flight_statues = Flight_status::all();
            $airports = Airport::all();
            $planes = Plane::all();
            return view('controlcenter',
                compact([
                    'flights','routes','flight_statues','airports','planes'
                ]));
        }
        elseif ($session == 'order'){

            $orders = Order::all();
            $tickets = Ticket_details::all();
            $prices = Ticket_price::paginate(8);


            return view('controlcenter',
                compact([
                    'orders','tickets','prices'
                ]));
        }
        elseif ($session == 'plane'){

            $planes = Plane::all();
            $plane_types = Plane_type::all();
            $seats = Seat::paginate(10);
            $classes = Classes::all();
            return view('controlcenter',
                compact([
                    'planes','plane_types','seats','classes'
                ]));
        }
    }
}
