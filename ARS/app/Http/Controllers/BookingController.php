<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Route_direct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Filter;

class BookingController extends Controller
{
    public function search_place(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('airports')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block ; position:absolute ; width: 80%; margin-left: 55px
                    ">';
            foreach ($data as $row) {
                $output .= '
            <li style="line-height: 2em; margin-left: 10px; font-size: 15px; color: #777; cursor: pointer">' . $row->name . '</li>
            ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function create(Request $request)
    {
        $origin_airport = Airport::where('name', '=', $request->place_from)->first();
        $arrival_airport = Airport::where('name', '=', $request->place_to)->first();
        $flight_from_transit_outbound = collect();
        $flight_transit_to_outbound = collect();
        $flight_from_transit_inbound = collect();
        $flight_transit_to_inbound = collect();
        $flight_return = 0;
        // IF HAVE ROUTE DIRECT
        // flight outbound
        $route_outbound = Route_direct::where('origin_airportid', '=', $origin_airport->id)
            ->where('arrival_airportid', '=', $arrival_airport->id)
            ->first();
        if ($route_outbound) {
            $flight_outbound = Flight::where('route_id', '=', $route_outbound->id)
                ->whereDate('departure_date', '>=', $request->date_outbound)
                ->take(30)->get();

            // flight return

            if ($request->date_return) {
                $route_return = Route_direct::where('origin_airportid', '=', $arrival_airport->id)
                    ->where('arrival_airportid', '=', $origin_airport->id)
                    ->first();
                $flight_return = Flight::where('route_id', '=', $route_return->id)
                    ->whereDate('departure_date','>=',$request->date_return)
                    ->take(30)->get();
            }

            return view('flight select',compact('flight_outbound','flight_return'));
        } elseif (!$route_outbound) {
            $route_from_transit_outbounds = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                ->take(10)
                ->get();

            $route_transit_to_outbounds = Route_direct::where('arrival_airportid', '=', $arrival_airport->id)
                ->take(10)
                ->get();

            $route_from_transit_outbound = collect();
            $route_transit_to_outbound = collect();
            for ($i = 0; $i < count($route_from_transit_outbounds); $i++) {
                for ($j = 0; $j < count($route_transit_to_outbounds); $j++) {
                    if ($route_from_transit_outbounds[$i]->arrival_airportid == $route_transit_to_outbounds[$j]->origin_airportid) {
                        $route_from_transit_outbound->push($route_from_transit_outbounds[$i]);
                        $route_transit_to_outbound->push($route_transit_to_outbounds[$j]);
                    }
                }
            }


            for ($i = 0; $i < count($route_from_transit_outbound); $i++) {
                $flight_one = Flight::where('route_id', '=', $route_from_transit_outbound[$i]->id)
                    ->whereDate('departure_date', '>=', $request->date_outbound)
                    ->first();
                if ($flight_one != null) {
                    $flight_from_transit_outbound->push($flight_one);
                    $flight_two = Flight::where('route_id', '=', $route_transit_to_outbound[$i]->id)
                        ->whereDate('departure_date', '>=', $flight_one->arrival_date)
                        ->orderBy('departure_date')
                        ->first();
                    if ($flight_two != null) {
                        $flight_transit_to_outbound->push($flight_two);
                    }
                } else {
                    continue;
                }

            }
            if ($request->date_return) {
                $route_from_transit_inbounds = Route_direct::where('origin_airportid', '=', $arrival_airport->id)
                    ->take(10)
                    ->get();

                $route_transit_to_inbounds = Route_direct::where('arrival_airportid', '=', $origin_airport->id)
                    ->take(10)
                    ->get();

                $route_from_transit_inbound = collect();
                $route_transit_to_inbound = collect();
                for ($x = 0; $x < count($route_from_transit_inbounds); $x++) {
                    for ($y = 0; $y < count($route_transit_to_inbounds); $y++) {
                        if ($route_from_transit_inbounds[$x]->arrival_airportid == $route_transit_to_inbounds[$y]->origin_airportid) {
                            $route_from_transit_inbound->push($route_from_transit_inbounds[$x]);
                            $route_transit_to_inbound->push($route_transit_to_inbounds[$y]);
                        }
                    }
                }



                for ($i = 0; $i < count($route_from_transit_inbound); $i++) {
                    $flight_three = Flight::where('route_id', '=', $route_from_transit_inbound[$i]->id)
                        ->whereDate('departure_date', '>=', $request->date_return)
                        ->first();
                    if ($flight_three != null) {
                        $flight_from_transit_inbound->push($flight_three);
                        $flight_four = Flight::where('route_id', '=', $route_transit_to_inbound[$i]->id)
                            ->whereDate('departure_date', '>=', $flight_three->arrival_date)
                            ->orderBy('departure_date')
                            ->first();
                        if ($flight_four != null) {
                            $flight_transit_to_inbound->push($flight_four);
                        }
                    } else {
                        continue;
                    }

                }

            }
            return view('light select transit',compact('flight_from_transit_outbound','flight_transit_to_outbound',
            'flight_from_transit_inbound','flight_transit_to_inbound'));
        }

    }
}
