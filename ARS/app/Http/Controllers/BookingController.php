<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Order;
use App\Models\Plane;
use App\Models\Plane_type;
use App\Models\Route_direct;
use App\Models\Seat;
use App\Models\Ticket_details;
use App\Models\Ticket_price;
use App\Utilities\VNPay;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use SebastianBergmann\CodeCoverage\Filter;
use Carbon\Carbon;
use Throwable;


class BookingController extends Controller
{
//    public function search_place(Request $request)
//    {
//        if ($request->get('query')) {
//            $query = $request->get('query');
//            $data = DB::table('airports')
//                ->where('name', 'LIKE', "%{$query}%")
//                ->get();
////            $output = '<ul class="dropdown-menu" style="display:block ; position:absolute ; width: 80%; margin-left: 55px
////                    ">';
////            foreach ($data as $row) {
////                $output .= '
////            <li style="line-height: 2em; margin-left: 10px; font-size: 15px; color: #777; cursor: pointer">' . $row->name . '</li>
////            ';
////            }
////            $output .= '</ul>';
//            $output ='';
//            foreach ($data as $row){
//                $output.= '<option style="line-height: 2em; margin-left: 10px; font-size: 15px; color: #777; cursor: pointer" value="'.$row->name.'">';
//            }
//            echo $output;
//        }
//    }

    public function create(Request $request)
    {

        // HANDLER DATE
        if ($request ){
            $origin_airport = Airport::where('name', '=', $request->place_from)->first();
            $arrival_airport = Airport::where('name', '=', $request->place_to)->first();
            $flight_from_transit_outbound = collect();
            $flight_transit_to_outbound = collect();
            $flight_from_transit_inbound = collect();
            $flight_transit_to_inbound = collect();
            $flight_return = collect();

            // IF HAVE ROUTE DIRECT
            // flight outbound
            if ($origin_airport != null &   $arrival_airport!= null & $origin_airport != $arrival_airport){
                $route_outbound = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                    ->where('arrival_airportid', '=', $arrival_airport->id)
                    ->first();
                session(['place_from'=>$request->place_from, 'place_to'=>$request->place_to,
                    'date_outbound'=>$request->date_outbound,'date_return'=>$request->date_return,
                    'class_id'=>$request->travel_class,'adult'=>$request->adult,
                    'children'=>$request->children,'senior'=>$request->senior
                ]);
                if ($route_outbound) {
                    session(['route_outbound_id '=>$route_outbound->id]);
                    $flight_outbound = Flight::where('route_id', '=', $route_outbound->id)
                        ->whereDate('departure_date', '=', $request->date_outbound)
                        ->take(30)->get();

                    // flight return

                    if ($request->date_return) {
                        $route_return = Route_direct::where('origin_airportid', '=', $arrival_airport->id)
                            ->where('arrival_airportid', '=', $origin_airport->id)
                            ->first();
                        $flight_return = Flight::where('route_id', '=', $route_return->id)
                            ->whereDate('departure_date','=',$request->date_return)
                            ->take(30)->get();
                        if ($route_return != null){session(['route_return_id'=>$route_return->id]);}
                        //other day
//                $flight_other_return =  DB::table('flights')
//                    ->select(DB::raw('flights.statusid, flights.route_id ,DATE(departure_date) as departure_date'))
//                    ->where('statusid','=',1)
//                    ->where('route_id','=',$route_return->id)
//                    ->distinct()
//                    ->get();
//
//                foreach ($flight_other_return as $flights){
//                    $other_return_days->push($flights->departure_date);
//                }
//            }

                    }
                    $outbound_details = array();
                    $return_details = array();
                    for ($i=0;$i<count($flight_outbound); $i++){
                        $outbound_details[$i] = $flight_outbound[$i];
                        $outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_outbound[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_outbound[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_outbound[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $outbound_details[$i]['seats_left'] = $seats_left;
                        $outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_outbound[$i]->route_id)
                            ->first()->duration;
                    }

                    for ($i=0;$i<count($flight_return); $i++){
                        $return_details[$i] = $flight_return[$i];
                        $return_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_return[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_return[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_return[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $return_details[$i]['seats_left'] = $seats_left;
                        $return_details[$i]['duration'] = Route_direct::where('id','=',$flight_return[$i]->route_id)
                            ->first()->duration;
                    }

                    session(['outbound_details'=>$outbound_details, 'return_details'=>$return_details]);
                    session()->forget('from_transit_outbound_details');
                    session()->forget('transit_to_outbound_details');
                    session()->forget('from_transit_inbound_details');
                    session()->forget('transit_to_inbound_details');
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
                    session(['route_from_transit_outbound'=>$route_from_transit_outbound,
                            'route_transit_to_outbound'=>$route_transit_to_outbound]
                    );
                    for ($i = 0; $i < count($route_from_transit_outbound); $i++) {
                        $flight_one = Flight::where('route_id', '=', $route_from_transit_outbound[$i]->id)
                            ->whereDate('departure_date', '=', $request->date_outbound)
                            ->first();
                        if ($flight_one != null) {
                            $flight_from_transit_outbound->push($flight_one);
                            $flight_two = Flight::where('route_id', '=', $route_transit_to_outbound[$i]->id)
                                ->whereDate('departure_date', '=', $request->date_outbound)
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

                        session(['route_from_transit_inbound'=>$route_from_transit_inbound,
                            'route_transit_to_inbound'=> $route_transit_to_inbound]);



                        for ($i = 0; $i < count($route_from_transit_inbound); $i++) {
                            $flight_three = Flight::where('route_id', '=', $route_from_transit_inbound[$i]->id)
                                ->whereDate('departure_date', '=', $request->date_return)
                                ->first();
                            if ($flight_three != null) {
                                $flight_from_transit_inbound->push($flight_three);
                                $flight_four = Flight::where('route_id', '=', $route_transit_to_inbound[$i]->id)
                                    ->whereDate('departure_date', '=', $request->date_return)
                                    ->first();
                                if ($flight_four != null) {
                                    $flight_transit_to_inbound->push($flight_four);
                                }
                            } else {
                                continue;
                            }

                        }

                    }

                    $from_transit_outbound_details = array();
                    $transit_to_outbound_details = array();
                    $from_transit_inbound_details = array();
                    $transit_to_inbound_details = array();

                    for ($i=0;$i<count($flight_from_transit_outbound); $i++){
                        $from_transit_outbound_details[$i] = $flight_from_transit_outbound[$i];
                        $from_transit_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_outbound[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_from_transit_outbound[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_outbound[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $from_transit_outbound_details[$i]['seats_left'] = $seats_left;
                        $from_transit_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                            ->first()->duration;
                        $airport_transit_id1 = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                            ->first()->arrival_airportid;
                        $airport_transit1 = Airport::where('id','=', $airport_transit_id1)-> first() -> name;
                        $from_transit_outbound_details[$i]['airport_transit'] = $airport_transit1;
                    }

                    for ($i=0;$i<count($flight_transit_to_outbound); $i++){
                        $transit_to_outbound_details[$i] = $flight_transit_to_outbound[$i];
                        $transit_to_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_outbound[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_transit_to_outbound[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_outbound[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $transit_to_outbound_details[$i]['seats_left'] = $seats_left;
                        $transit_to_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_outbound[$i]->route_id)
                            ->first()->duration;
                    }

                    for ($i=0;$i<count($flight_from_transit_inbound); $i++){
                        $from_transit_inbound_details[$i] = $flight_from_transit_inbound[$i];
                        $from_transit_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_inbound[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_from_transit_inbound[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_inbound[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $from_transit_inbound_details[$i]['seats_left'] = $seats_left;
                        $from_transit_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                            ->first()->duration;
                        $airport_transit_id2 = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                            ->first()->arrival_airportid;
                        $airport_transit2 = Airport::where('id','=', $airport_transit_id2) ->first() -> name;
                        $from_transit_inbound_details[$i]['airport_transit'] = $airport_transit2;
                    }

                    for ($i=0;$i<count($flight_transit_to_inbound); $i++){
                        $transit_to_inbound_details[$i] = $flight_transit_to_inbound[$i];
                        $transit_to_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_inbound[$i]->id)
                            ->where('class_id','=',$request->travel_class) ->first()->price;
                        $plane_type_id = Plane::where('id','=',$flight_transit_to_inbound[$i]->planeid)
                            ->first()->plane_type;
                        $total_seats = Plane_type::where('id','=',$plane_type_id)
                            ->first()->total_seats;
                        $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_inbound[$i]->id)->take(400)->get());
                        $seats_left = $total_seats - $seats_not_avalable;
                        $transit_to_inbound_details[$i]['seats_left'] = $seats_left;
                        $transit_to_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_inbound[$i]->route_id)
                            ->first()->duration;
                    }

                    session(['from_transit_outbound_details'=> $from_transit_outbound_details,
                        'transit_to_outbound_details' => $transit_to_outbound_details,
                        'from_transit_inbound_details' =>  $from_transit_inbound_details,
                        'transit_to_inbound_details' =>  $transit_to_inbound_details]);
                    session()->forget('outbound_details');
                    session()->forget('return_details');
                }
            }

            return redirect('/booking/show_flights');
        }
        else{
            return redirect('/');
        }

    }

    public function create_reschedule(array $require, array $passengers, array $order){
        session()->forget('from_transit_outbound_details');
        session()->forget('transit_to_outbound_details');
        session()->forget('from_transit_inbound_details');
        session()->forget('transit_to_inbound_details');
        session()->forget('outbound_details');
        session()->forget('return_details');
        session()->forget('date_return');
        session()->forget('no_flight');
        session()->forget('flight_outbound_choose');
        session()->forget('flight_outbound_from_transit_choose');
        session()->forget('passengers');
        session()->forget('total_price');
        session()->forget('total_passengers');
        session()->forget(['code','way','account','price','passengers','flights',
            'ori_airports','arr_airports','planeId','duration','reschedule']);
        session(['passengers'=>$passengers,'old_order'=>$order,'total_passengers'=>$require['adult']]);
        $seat_location_first = $order['ticket_details'][0]['seat_location'];
        $plane_id = $order['ticket_details'][0]['flight']['planeid'];
        $plane_type = Plane::find($plane_id)->plane_type;
        $class_id = Seat::where('seat_location','=',$seat_location_first)
            ->where('plane_type','=',$plane_type)->first()->class_id;
        $origin_airport = Airport::where('name', '=', $require['place_from'])->first();
        $arrival_airport = Airport::where('name', '=', $require['place_to'])->first();
        $flight_from_transit_outbound = collect();
        $flight_transit_to_outbound = collect();
        $flight_from_transit_inbound = collect();
        $flight_transit_to_inbound = collect();
        $flight_return = collect();
        if ($origin_airport != null &   $arrival_airport!= null & $origin_airport != $arrival_airport){
            $route_outbound = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                ->where('arrival_airportid', '=', $arrival_airport->id)
                ->first();
            session(['place_from'=>$require['place_from'], 'place_to'=>$require['place_to'],
                'date_outbound'=>$require['date_outbound'],'date_return'=>$require['date_return'],
                'class_id'=>$class_id,'total_passengers'=>$require['adult']
            ]);
            if ($route_outbound) {
                session(['route_outbound_id '=>$route_outbound->id]);
                $flight_outbound = Flight::where('route_id', '=', $route_outbound->id)
                    ->whereDate('departure_date', '=',$require['date_outbound'])
                    ->take(30)->get();
                // flight return

                if ($require['date_return'] != null) {
                    $route_return = Route_direct::where('origin_airportid', '=', $arrival_airport->id)
                        ->where('arrival_airportid', '=', $origin_airport->id)
                        ->first();
                    $flight_return = Flight::where('route_id', '=', $route_return->id)
                        ->whereDate('departure_date','=',$require['date_return'])
                        ->take(30)->get();
                    if ($route_return != null){session(['route_return_id'=>$route_return->id]);}
                }
                $outbound_details = array();
                $return_details = array();
                for ($i=0;$i<count($flight_outbound); $i++){
                    $outbound_details[$i] = $flight_outbound[$i];
                    $outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_outbound[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_outbound[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_outbound[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $outbound_details[$i]['seats_left'] = $seats_left;
                    $outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_outbound[$i]->route_id)
                        ->first()->duration;
                }

                for ($i=0;$i<count($flight_return); $i++){
                    $return_details[$i] = $flight_return[$i];
                    $return_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_return[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_return[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_return[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $return_details[$i]['seats_left'] = $seats_left;
                    $return_details[$i]['duration'] = Route_direct::where('id','=',$flight_return[$i]->route_id)
                        ->first()->duration;
                }

                session(['outbound_details'=>$outbound_details, 'return_details'=>$return_details]);
                session()->forget('from_transit_outbound_details');
                session()->forget('transit_to_outbound_details');
                session()->forget('from_transit_inbound_details');
                session()->forget('transit_to_inbound_details');
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
                session(['route_from_transit_outbound'=>$route_from_transit_outbound,
                        'route_transit_to_outbound'=>$route_transit_to_outbound]
                );
                for ($i = 0; $i < count($route_from_transit_outbound); $i++) {
                    $flight_one = Flight::where('route_id', '=', $route_from_transit_outbound[$i]->id)
                        ->whereDate('departure_date', '=', $require['date_outbound'])
                        ->first();
                    if ($flight_one != null) {
                        $flight_from_transit_outbound->push($flight_one);
                        $flight_two = Flight::where('route_id', '=', $route_transit_to_outbound[$i]->id)
                            ->whereDate('departure_date', '=', $require['date_outbound'])
                            ->first();
                        if ($flight_two != null) {
                            $flight_transit_to_outbound->push($flight_two);
                        }
                    } else {
                        continue;
                    }

                }
                if ($require['date_return'] != null) {
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

                    session(['route_from_transit_inbound'=>$route_from_transit_inbound,
                        'route_transit_to_inbound'=> $route_transit_to_inbound]);



                    for ($i = 0; $i < count($route_from_transit_inbound); $i++) {
                        $flight_three = Flight::where('route_id', '=', $route_from_transit_inbound[$i]->id)
                            ->whereDate('departure_date', '=', $require['date_return'])
                            ->first();
                        if ($flight_three != null) {
                            $flight_from_transit_inbound->push($flight_three);
                            $flight_four = Flight::where('route_id', '=', $route_transit_to_inbound[$i]->id)
                                ->whereDate('departure_date', '=', $require['date_return'])
                                ->first();
                            if ($flight_four != null) {
                                $flight_transit_to_inbound->push($flight_four);
                            }
                        } else {
                            continue;
                        }

                    }

                }

                $from_transit_outbound_details = array();
                $transit_to_outbound_details = array();
                $from_transit_inbound_details = array();
                $transit_to_inbound_details = array();

                for ($i=0;$i<count($flight_from_transit_outbound); $i++){
                    $from_transit_outbound_details[$i] = $flight_from_transit_outbound[$i];
                    $from_transit_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_outbound[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_from_transit_outbound[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_outbound[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $from_transit_outbound_details[$i]['seats_left'] = $seats_left;
                    $from_transit_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                        ->first()->duration;
                    $airport_transit_id1 = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                        ->first()->arrival_airportid;
                    $airport_transit1 = Airport::where('id','=', $airport_transit_id1)-> first() -> name;
                    $from_transit_outbound_details[$i]['airport_transit'] = $airport_transit1;
                }

                for ($i=0;$i<count($flight_transit_to_outbound); $i++){
                    $transit_to_outbound_details[$i] = $flight_transit_to_outbound[$i];
                    $transit_to_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_outbound[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_transit_to_outbound[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_outbound[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $transit_to_outbound_details[$i]['seats_left'] = $seats_left;
                    $transit_to_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_outbound[$i]->route_id)
                        ->first()->duration;
                }

                for ($i=0;$i<count($flight_from_transit_inbound); $i++){
                    $from_transit_inbound_details[$i] = $flight_from_transit_inbound[$i];
                    $from_transit_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_inbound[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_from_transit_inbound[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_inbound[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $from_transit_inbound_details[$i]['seats_left'] = $seats_left;
                    $from_transit_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                        ->first()->duration;
                    $airport_transit_id2 = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                        ->first()->arrival_airportid;
                    $airport_transit2 = Airport::where('id','=', $airport_transit_id2) ->first() -> name;
                    $from_transit_inbound_details[$i]['airport_transit'] = $airport_transit2;
                }

                for ($i=0;$i<count($flight_transit_to_inbound); $i++){
                    $transit_to_inbound_details[$i] = $flight_transit_to_inbound[$i];
                    $transit_to_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_inbound[$i]->id)
                        ->where('class_id','=',$class_id) ->first()->price;
                    $plane_type_id = Plane::where('id','=',$flight_transit_to_inbound[$i]->planeid)
                        ->first()->plane_type;
                    $total_seats = Plane_type::where('id','=',$plane_type_id)
                        ->first()->total_seats;
                    $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_inbound[$i]->id)->take(400)->get());
                    $seats_left = $total_seats - $seats_not_avalable;
                    $transit_to_inbound_details[$i]['seats_left'] = $seats_left;
                    $transit_to_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_inbound[$i]->route_id)
                        ->first()->duration;
                }

                session(['from_transit_outbound_details'=> $from_transit_outbound_details,
                    'transit_to_outbound_details' => $transit_to_outbound_details,
                    'from_transit_inbound_details' =>  $from_transit_inbound_details,
                    'transit_to_inbound_details' =>  $transit_to_inbound_details]);
                session()->forget('outbound_details');
                session()->forget('return_details');
            }
        }

    }

    public function show_flights(){

        if (session('outbound_details')){
            return view('flight select');
        }
        elseif (session('from_transit_outbound_details')){
            return view('flight select transit');
        }
        elseif (!session('outbound_details') && !session('from_transit_outbound_details')){
            return view('flight select');
        }

    }

    public function search_other_date(Request $request){

        //Controller process ajax to change outbound

        if ($request->get('other_outbound')) {
            $other_outbound = $request->get('other_outbound');
            $flight_outbound = Flight::where('route_id', '=',session('route_outbound_id '))
                ->whereDate('departure_date', '=', $other_outbound)
                ->take(30)->get();


            $outbound_details = array();

            for ($i=0;$i<count($flight_outbound); $i++){
                $outbound_details[$i] = array();
                $outbound_details[$i] = $flight_outbound[$i];
                $outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_outbound[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_outbound[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_outbound[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $outbound_details[$i]['seats_left'] = $seats_left;
                $outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_outbound[$i]->route_id)
                    ->first()->duration;

            }
            session(['outbound_details'=>$flight_outbound]);


            $output_outbound = '';
            if (count(session('outbound_details')) == 0){
                $output_outbound .= '<h5 style="text-align: center; margin-top: 20px">No flight found</h5>';
            }
            else{
                foreach (session('outbound_details') as $outbound_detail ){

                    $output_outbound .= '<div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" required name="flight_outbound" value="'.$outbound_detail->id.'" >
                </div>

            <div class="col-md-11">
                <table>
                    <tr>
                        <td rowspan="2">' . $outbound_detail->id . '</td>'.
                        ' <td>'. session("place_from") .' &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'. session("place_to"). '</td>'.
                        '<td>Date:</td>'.
                        '<td>' . Carbon::parse($outbound_detail->departure_date)->format("d/m/Y") .'</td>'.
                        '<td>Departure:</td>'.
                        '<td>'.Carbon::parse($outbound_detail->departure_date)->format("H:i").'</td>'.
                        '<td rowspan="2">USD  '. $outbound_detail->price.' </td>'.
                        '</tr>
                    <tr>
                        <td>' . $outbound_detail->seats_left . 'seat(s) left</td>'.
                        '<td>Duration: </td>'.
                        '<td>'. $outbound_detail->duration .' hour(s)</td>'.
                        ' <td>Arrival:</td>
                        <td>'.Carbon::parse($outbound_detail->arrival_date)->format("H:i").'</td>'.
                        ' </tr>
                </table>
            </div>
        </div>';

                }
            }

            echo $output_outbound;

        }

        //Controller process ajax to change inbound

        if ($request->get('other_return')){
            $other_return = $request->get('other_return');
            $flight_return = Flight::where('route_id', '=', session('route_return_id'))
                ->whereDate('departure_date', '=', $other_return)
                ->take(30)->get();
            $return_details = array();
            for ($i=0;$i<count($flight_return); $i++){
                $return_details[$i] = $flight_return[$i];
                $return_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_return[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_return[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_return[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $return_details[$i]['seats_left'] = $seats_left;
                $return_details[$i]['duration'] = Route_direct::where('id','=',$flight_return[$i]->route_id)
                    ->first()->duration;
            }


            session(['return_details'=>$flight_return]);

            $output_return = '';
            if (count(session('return_details'))==0){
                $output_return .= '<h5 style="text-align: center; margin-top: 20px">No flight found</h5>';
            }
            else{
                foreach (session('return_details') as $return_detail){
                    $output_return .= '<div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" required name="flight_return" value="'.$return_detail->id.'" >

                </div>

            <div class="col-md-11">
                <table>
                    <tr>
                        <td rowspan="2">' . $return_detail->id . '</td>'.
                        ' <td>'. session("place_to") .' &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'. session("place_from"). '</td>'.
                        '<td>Date:</td>'.
                        '<td>' . Carbon::parse($return_detail->departure_date)->format("d/m/Y") .'</td>'.
                        '<td>Departure:</td>'.
                        '<td>'.Carbon::parse($return_detail->departure_date)->format("H:i").'</td>'.
                        '<td rowspan="2">USD  '. $return_detail->price.' </td>'.
                        '</tr>
                    <tr>
                        <td>' . $return_detail->seats_left . 'seat(s) left</td>'.
                        '<td>Duration: </td>'.
                        '<td>'. $return_detail->duration .' hour(s)</td>'.
                        ' <td>Arrival:</td>
                        <td>'.Carbon::parse($return_detail->arrival_date)->format("H:i").'</td>'.
                        ' </tr>
                </table>
            </div>
        </div>';
                }
            }

            echo $output_return;
        }

        //Controller process ajax to change inbound transit

        if ($request->get('other_outbound_transit')){
            $other_outbound_transit = $request->get('other_outbound_transit');
            $route_from_transit_outbound = session('route_from_transit_outbound');
            $route_transit_to_outbound = session('route_transit_to_outbound');
            $flight_from_transit_outbound = collect();
            $flight_transit_to_outbound = collect();
            for ($i = 0; $i < count($route_from_transit_outbound); $i++) {
                $flight_one = Flight::where('route_id', '=', $route_from_transit_outbound[$i]->id)
                    ->whereDate('departure_date', '=', $other_outbound_transit)
                    ->first();
                if ($flight_one != null) {
                    $flight_from_transit_outbound->push($flight_one);
                    $flight_two = Flight::where('route_id', '=', $route_transit_to_outbound[$i]->id)
                        ->whereDate('departure_date', '=', $other_outbound_transit)
                        ->first();
                    if ($flight_two != null) {
                        $flight_transit_to_outbound->push($flight_two);
                    }
                } else {
                    continue;
                }

            }


            $from_transit_outbound_details = array();
            $transit_to_outbound_details = array();

            for ($i=0;$i<count($flight_from_transit_outbound); $i++){
                $from_transit_outbound_details[$i] = $flight_from_transit_outbound[$i];
                $from_transit_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_outbound[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_from_transit_outbound[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_outbound[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $from_transit_outbound_details[$i]['seats_left'] = $seats_left;
                $from_transit_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                    ->first()->duration;
                $airport_transit_id1 = Route_direct::where('id','=',$flight_from_transit_outbound[$i]->route_id)
                    ->first()->arrival_airportid;
                $airport_transit1 = Airport::where('id','=', $airport_transit_id1)-> first() -> name;
                $from_transit_outbound_details[$i]['airport_transit'] = $airport_transit1;
            }

            for ($i=0;$i<count($flight_transit_to_outbound); $i++){
                $transit_to_outbound_details[$i] = $flight_transit_to_outbound[$i];
                $transit_to_outbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_outbound[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_transit_to_outbound[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_outbound[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $transit_to_outbound_details[$i]['seats_left'] = $seats_left;
                $transit_to_outbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_outbound[$i]->route_id)
                    ->first()->duration;
            }

            session(['from_transit_outbound_details'=>$flight_from_transit_outbound,
                'transit_to_outbound_details'=>$flight_transit_to_outbound]);

            $output_outbound_transit = '';
            if (count(session('from_transit_outbound_details'))==0){
                $output_outbound_transit.= '<h5 style="text-align: center; margin-top: 20px">No flight found</h5>';
            }
            else{
                for ($i = 0; $i< count(session('from_transit_outbound_details')); $i++){
                    $output_outbound_transit.= '<div class="row col-md-12 flight-detail" style="height: 130px">
                    <div class="col-md-1">
                        <input type="radio" required name="flight_outbound_from_transit" value="'.session("from_transit_outbound_details")[$i]->id.'" style="height: 70px;cursor: pointer">
                        <input type="hidden" name="flight_outbound_transit_to" value="'.session('transit_to_outbound_details')[$i]->id.'">
                    </div>
                    <div class="col-md-11">
                        <table style="border-bottom: 0.5px solid #F5F5F5;margin-bottom: 10px">
                            <tr>
                                <td rowspan="2">'.session("from_transit_outbound_details")[$i]->id.'</td>'.
                        '<td style="    width: 280px;">'.session("place_from").' &nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'.session("from_transit_outbound_details")[$i]->airport_transit.'</td>'.
                        '<td>Date:</td>
                                <td>'.Carbon::parse(session("from_transit_outbound_details")[$i]->departure_date)->format("d/m/Y").'</td>'.
                        '<td>Departure:</td>
                                <td>'.Carbon::parse(session("from_transit_outbound_details")[$i]->departure_date)->format("H:i").'</td>'.
                        '<td rowspan="2">USD '.session('from_transit_outbound_details')[$i]->price.'</td>'.
                        '</tr>
                            <tr>
                                <td>'.session('from_transit_outbound_details')[$i]->seats_left.'  seat(s) left</td>'.
                        ' <td>Duration: </td>
                                <td>'.session('from_transit_outbound_details')[$i]->duration. ' hour(s)</td>'.
                        '<td>Arrival:</td>
                                <td>'.Carbon::parse(session('from_transit_outbound_details')[$i]->arrival_date)->format('H:i').'</td>'.
                        ' </tr>
                        </table>
                        <table>
                            <tr>
                                <td rowspan="2">'.session('transit_to_outbound_details')[$i]->id.'</td>'.
                        '<td style="    width: 280px;">'.session('from_transit_outbound_details')[$i]->airport_transit.' &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'.session('place_to').'</td>'.
                        '<td>Date:</td>
                                <td>'.Carbon::parse(session('transit_to_outbound_details')[$i]->departure_date)->format('d/m/Y').'</td>'.
                        '<td>Departure:</td>
                                <td>'.Carbon::parse(session('transit_to_outbound_details')[$i]->departure_date)->format('H:i').'</td>'.
                        '<td rowspan="2">USD '.session('transit_to_outbound_details')[$i]->price.'</td>'.
                        ' </tr>
                            <tr>
                                <td>'.session('transit_to_outbound_details')[$i]->seats_left.' seat(s) left</td>'.
                        ' <td>Duration: </td>
                                <td>'.session('transit_to_outbound_details')[$i]->duration.' hour(s)</td>
                                <td>Arrival:</td>
                                <td>'.Carbon::parse(session('transit_to_outbound_details')[$i]->arrival_date)->format('H:i').'</td>
                            </tr>
                        </table>
                    </div>
                </div>';

                }
            }

            echo $output_outbound_transit;
        }

        // Controller process ajax to change return transit

        if ($request->get('other_return_transit')){
            $other_return_transit = $request->get('other_return_transit');
            $route_from_transit_inbound = session('route_from_transit_inbound');
            $route_transit_to_inbound = session('route_transit_to_inbound');
            $flight_from_transit_inbound = collect();
            $flight_transit_to_inbound = collect();

            for ($i = 0; $i < count($route_from_transit_inbound); $i++) {
                $flight_three = Flight::where('route_id', '=', $route_from_transit_inbound[$i]->id)
                    ->whereDate('departure_date', '=',  $other_return_transit)
                    ->first();
                if ($flight_three != null) {
                    $flight_from_transit_inbound->push($flight_three);
                    $flight_four = Flight::where('route_id', '=', $route_transit_to_inbound[$i]->id)
                        ->whereDate('departure_date', '=',  $other_return_transit)
                        ->first();
                    if ($flight_four != null) {
                        $flight_transit_to_inbound->push($flight_four);
                    }
                } else {
                    continue;
                }

            }

            $from_transit_inbound_details = array();
            $transit_to_inbound_details = array();

            for ($i=0;$i<count($flight_from_transit_inbound); $i++){
                $from_transit_inbound_details[$i] = $flight_from_transit_inbound[$i];
                $from_transit_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_from_transit_inbound[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_from_transit_inbound[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_from_transit_inbound[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $from_transit_inbound_details[$i]['seats_left'] = $seats_left;
                $from_transit_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                    ->first()->duration;
                $airport_transit_id2 = Route_direct::where('id','=',$flight_from_transit_inbound[$i]->route_id)
                    ->first()->arrival_airportid;
                $airport_transit2 = Airport::where('id','=', $airport_transit_id2) ->first() -> name;
                $from_transit_inbound_details[$i]['airport_transit'] = $airport_transit2;
            }

            for ($i=0;$i<count($flight_transit_to_inbound); $i++){
                $transit_to_inbound_details[$i] = $flight_transit_to_inbound[$i];
                $transit_to_inbound_details[$i]['price'] = Ticket_price::where('flight_id','=',$flight_transit_to_inbound[$i]->id)
                    ->where('class_id','=',session('class_id')) ->first()->price;
                $plane_type_id = Plane::where('id','=',$flight_transit_to_inbound[$i]->planeid)
                    ->first()->plane_type;
                $total_seats = Plane_type::where('id','=',$plane_type_id)
                    ->first()->total_seats;
                $seats_not_avalable = count(Ticket_details::where('flight_id','=',$flight_transit_to_inbound[$i]->id)->take(400)->get());
                $seats_left = $total_seats - $seats_not_avalable;
                $transit_to_inbound_details[$i]['seats_left'] = $seats_left;
                $transit_to_inbound_details[$i]['duration'] = Route_direct::where('id','=',$flight_transit_to_inbound[$i]->route_id)
                    ->first()->duration;
            }

            session(['from_transit_inbound_details'=>$flight_from_transit_inbound,
                'transit_to_inbound_details'=>$flight_transit_to_inbound]);

            $output_return_transit = '';
            if (count(session('from_transit_inbound_details'))==0){
                $output_return_transit .= '<h5 style="text-align: center; margin-top: 20px">No flight found</h5>';
            }
            else{
                for ($i = 0; $i< count(session('from_transit_inbound_details')); $i++){
                    $output_return_transit.= '<div class="row col-md-12 flight-detail" style="height: 130px">
                    <div class="col-md-1">
                        <input type="radio" required name="flight_return_from_transit" value="'.session("from_transit_inbound_details")[$i]->id.'" style="height: 70px;cursor: pointer">
                        <input type="hidden" name="flight_return_transit_to" value="'.session('transit_to_inbound_details')[$i]->id.'">
                    </div>
                    <div class="col-md-11">
                        <table style="border-bottom: 0.5px solid #F5F5F5;margin-bottom: 10px">
                            <tr>
                                <td rowspan="2">'.session("from_transit_inbound_details")[$i]->id.'</td>'.
                        '<td style="    width: 280px;">'.session("place_to").' &nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'.session("from_transit_outbound_details")[$i]->airport_transit.'</td>'.
                        '<td>Date:</td>
                                <td>'.Carbon::parse(session("from_transit_inbound_details")[$i]->departure_date)->format("d/m/Y").'</td>'.
                        '<td>Departure:</td>
                                <td>'.Carbon::parse(session("from_transit_inbound_details")[$i]->departure_date)->format("H:i").'</td>'.
                        '<td rowspan="2">USD '.session('from_transit_inbound_details')[$i]->price.'</td>'.
                        '</tr>
                            <tr>
                                <td>'.session('from_transit_inbound_details')[$i]->seats_left.'  seat(s) left</td>'.
                        ' <td>Duration: </td>
                                <td>'.session('from_transit_inbound_details')[$i]->duration. ' hour(s)</td>'.
                        '<td>Arrival:</td>
                                <td>'.Carbon::parse(session('from_transit_inbound_details')[$i]->arrival_date)->format('H:i').'</td>'.
                        ' </tr>
                        </table>
                        <table>
                            <tr>
                                <td rowspan="2">'.session('transit_to_inbound_details')[$i]->id.'</td>'.
                        '<td style="    width: 280px;">'.session('from_transit_inbound_details')[$i]->airport_transit.' &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;'.session('place_from').'</td>'.
                        '<td>Date:</td>
                                <td>'.Carbon::parse(session('transit_to_inbound_details')[$i]->departure_date)->format('d/m/Y').'</td>'.
                        '<td>Departure:</td>
                                <td>'.Carbon::parse(session('transit_to_inbound_details')[$i]->departure_date)->format('H:i').'</td>'.
                        '<td rowspan="2">USD '.session('transit_to_inbound_details')[$i]->price.'</td>'.
                        ' </tr>
                            <tr>
                                <td>'.session('transit_to_inbound_details')[$i]->seats_left.' seat(s) left</td>'.
                        ' <td>Duration: </td>
                                <td>'.session('transit_to_inbound_details')[$i]->duration.' hour(s)</td>
                                <td>Arrival:</td>
                                <td>'.Carbon::parse(session('transit_to_inbound_details')[$i]->arrival_date)->format('H:i').'</td>
                            </tr>
                        </table>
                    </div>
                </div>';

                }
            }
            echo $output_return_transit;

        }



    }

    public function choose_flight(Request $request){

        if ($request->get('flight_outbound')){
            session()->forget('flight_outbound_from_transit_choose');
            session()->forget('flight_outbound_transit_to_choose');
            session()->forget('flight_return_from_transit_choose');
            session()->forget('flight_return_transit_to_choose');
            session(['flight_outbound_choose'=>$request->get('flight_outbound')]) ;

            if ($request->get('flight_return')){
                session(['flight_return_choose'=>$request->get('flight_return')]);
            }
            elseif (!$request->get('flight_return')){
                session()->forget('flight_return_choose');
            };
        }
        elseif ($request->get('flight_outbound_from_transit')){
            session(['flight_outbound_from_transit_choose'=>$request->get('flight_outbound_from_transit'),
                'flight_outbound_transit_to_choose'=>$request->get('flight_outbound_transit_to')]);
            session()->forget('flight_outbound_choose');
            session()->forget('flight_outbound_choose');
            if ($request->get('flight_return_from_transit')){
                session(['flight_return_from_transit_choose'=>$request->get('flight_return_from_transit'),
                    'flight_return_transit_to_choose'=>$request->get('flight_return_transit_to')]);
            }
            elseif (!$request->get('flight_return_from_transit')){
                session()->forget('flight_return_from_transit_choose');
                session()->forget('flight_return_transit_to_choose');
            }
        }
        session(['page'=>'choose_flight']);


        if (session('email') && session('password')){
            return redirect('/booking/passenger_index');
        }
        else{
            return redirect('/sign-in');
        }

    }

    public function passenger_index(){

        $this->fare_detail();

        if (session('email') && session('password') && (session('flight_outbound_choose') || session('flight_outbound_from_transit_choose'))){
            return view('passengers');
        }
        else {
            return redirect('/');
        }


    }

    public function fare_detail(){
        $flight=array();
        $total_price_one = 0;
        $total_passengers = session('adult') + session('children') + session('senior');
        if (session('flight_outbound_choose')){
            session()->forget('flights_choose');

            $flight[0] = Flight::where('id','=',session('flight_outbound_choose'))->first();

            $flight[0]['price'] = Ticket_price::where('flight_id','=',$flight[0]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $flight[0]['place_from'] = session('place_from');

            $flight[0]['place_to'] = session('place_to');

            $flight[0]['plane_type'] = $flight[0]->plane->plane_type;

            $total_price_one+= $flight[0]['price'];

            if (session('flight_return_choose')){
                $flight[1] = Flight::where('id','=',session('flight_return_choose'))->first();

                $flight[1]['price'] = Ticket_price::where('flight_id','=',$flight[1]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[1]['place_from'] = session('place_to');

                $flight[1]['place_to'] = session('place_from');

                $flight[1]['plane_type'] = $flight[1]->plane->plane_type;

                $total_price_one+= $flight[1]['price'];
            }

            if(session('total_passengers')){
                session(['flights_choose'=>$flight,'total_price_one'=>$total_price_one]);
            }
            elseif(!session('total_passengers')){
                session(['flights_choose'=>$flight,'total_price_one'=>$total_price_one,'total_passengers'=>$total_passengers]);
            }
        }
        elseif (session('flight_outbound_from_transit_choose')) {
            session()->forget('flights_choose');
            $flight[0] = Flight::where('id','=',session('flight_outbound_from_transit_choose'))->first();

            $flight[0]['price'] = Ticket_price::where('flight_id','=',$flight[0]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $airport_transit_id = Route_direct::where('id','=',$flight[0]->route_id)
                ->first()->arrival_airportid;
            $airport_transit = Airport::where('id','=', $airport_transit_id)-> first() -> name;


            $flight[0]['place_from'] = session('place_from');

            $flight[0]['place_to'] = $airport_transit;

            $flight[0]['plane_type'] = $flight[0]->plane->plane_type;

            $total_price_one+= $flight[0]['price'];


            $flight[1] = Flight::where('id','=',session('flight_outbound_transit_to_choose'))->first();

            $flight[1]['price'] = Ticket_price::where('flight_id','=',$flight[1]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $flight[1]['place_from'] = $airport_transit;

            $flight[1]['place_to'] = session('place_to');

            $flight[1]['plane_type'] = $flight[1]->plane->plane_type;

            $total_price_one+= $flight[1]['price'];


            if (session('flight_return_from_transit_choose')){
                $flight[2] = Flight::where('id','=',session('flight_return_from_transit_choose'))->first();

                $flight[2]['price'] = Ticket_price::where('flight_id','=',$flight[2]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[2]['place_from'] = session('place_to');

                $flight[2]['place_to'] = $airport_transit;

                $flight[2]['plane_type'] = $flight[2]->plane->plane_type;

                $total_price_one+= $flight[2]['price'];


                $flight[3] = Flight::where('id','=',session('flight_return_transit_to_choose'))->first();

                $flight[3]['price'] = Ticket_price::where('flight_id','=',$flight[3]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[3]['place_from'] =  $airport_transit;

                $flight[3]['place_to'] = session('place_from');

                $flight[3]['plane_type'] = $flight[3]->plane->plane_type;

                $total_price_one+= $flight[3]['price'];
            }

            if(session('total_passengers')){
                session(['flights_choose'=>$flight,'total_price_one'=>$total_price_one]);
            }
            elseif(!session('total_passengers')){
                session(['flights_choose'=>$flight,'total_price_one'=>$total_price_one,'total_passengers'=>$total_passengers]);
            }

        }



    }

    public  function set_type_customer(int $age):int{
        $children_min = 0;
        $children_max = 10;
        $adult_min = 11;
        $adult_max = 65;
        $senior_min = 66;
        $type_customer = 0;
        if ($age >=0 && $age <= 10){
            $type_customer = 1;
        }
        elseif ($age >= 11 && $age <=65 ){
            $type_customer = 2;
        }
        else {
            $type_customer = 3;
        }
        return $type_customer;
    }

    public function create_passengers(Request $request){

        if (!session('reschedule')){
            $passengers = array();
            $children_min = 0;
            $children_max = 10;
            $adult_min = 11;
            $adult_max = 65;
            $senior_min = 66;
            $total_price_one = session('total_price_one');
            $total_price = 0;
            $last_passenger = DB::table('customers')->orderBy('id', 'DESC')->first();
            $last_id_passenger =  $last_passenger->id;
            for ($i=0; $i< count($request->first_name); $i++){
                if ($i==0){
                    ++$last_id_passenger;
                    $passengers[$i]['id'] = $last_id_passenger;
                    $passengers[$i]['firstname'] = $request->first_name[$i];
                    $passengers[$i]['lastname'] = $request->last_name[$i];
                    $passengers[$i]['phone'] = session('check')->phone;
                    $passengers[$i]['email'] = session('email');
                    $passengers[$i]['dob'] = $request->dob[$i];
                    $passengers[$i]['sex'] = $request->sex[$i];
                    $passengers[$i]['age'] = Carbon::parse($request->dob[$i])->age;
                    $passengers[$i]['type'] = $this->set_type_customer(Carbon::parse($request->dob[$i])->age);
                    switch ($passengers[$i]['type']){
                        case '1':
                            $total_price+= $total_price_one * 0.6;
                            break;
                        case '2':
                            $total_price+= $total_price_one;
                            break;
                        case '3':
                            $total_price+= $total_price_one * 0.8;
                            break;
                    }
                }
                elseif ($i != 0){
                    ++$last_id_passenger;
                    $passengers[$i]['id'] = $last_id_passenger;
                    $passengers[$i]['firstname'] = $request->first_name[$i];
                    $passengers[$i]['lastname'] = $request->last_name[$i];
                    $passengers[$i]['dob'] = $request->dob[$i];
                    $passengers[$i]['sex'] = $request->sex[$i];
                    $passengers[$i]['age'] = Carbon::parse($request->dob[$i])->age;
                    $passengers[$i]['type'] = $this->set_type_customer(Carbon::parse($request->dob[$i])->age);
                    switch ($passengers[$i]['type']){
                        case '1':
                            $total_price+= $total_price_one * 0.6;
                            break;
                        case '2':
                            $total_price+= $total_price_one;
                            break;
                        case '3':
                            $total_price+= $total_price_one * 0.8;
                            break;
                    }
                }
            }

            session(['passengers'=>$passengers,'total_price'=>$total_price]);
            return redirect('/booking/show_seats');
        }
        elseif (session('reschedule')){
            $passengers = session('passengers');
            $children_min = 0;
            $children_max = 10;
            $adult_min = 11;
            $adult_max = 65;
            $senior_min = 66;
            $total_price_one = session('total_price_one');
            $total_price = 0;
            for ($i=0; $i< count($request->first_name); $i++){
                    $passengers[$i]['age'] = Carbon::parse($request->dob[$i])->age;
                    $passengers[$i]['type'] = $this->set_type_customer(Carbon::parse($request->dob[$i])->age);
                    switch ($passengers[$i]['type']){
                        case '1':
                            $total_price+= $total_price_one * 0.6;
                            break;
                        case '2':
                            $total_price+= $total_price_one;
                            break;
                        case '3':
                            $total_price+= $total_price_one * 0.8;
                            break;
                    }
            }

            session(['passengers'=>$passengers,'total_price'=>$total_price]);
            $diff_amount = $total_price + 25*session('total_passengers')*count(session('flights_choose')) - session('old_order')['total_price'];
            session(['diff_amount'=>$diff_amount]);
            return redirect('/booking/show_seats');
        }

    }

    public function show_seats(){
        if (session('email') && session('password') && (session('flight_outbound_choose') || session('flight_outbound_from_transit_choose'))
        && session('passengers') && session('total_price')){
            return view('Select seats');
        }
        else{
            return redirect('/');
        }

    }

    public function select_seats(Request $request){

        if (!session('reschedule')){
            if (session('email') && session('password') && (session('flight_outbound_choose') || session('flight_outbound_from_transit_choose'))
                && session('passengers') && session('total_price') && $request!= null){
                $seats = $request->seat;
                $flights = session('flights_choose');
                $passengers = session('passengers');
                $tickets = array();
                $count = 0;
                if ($seats){
                    for ($i = 0; $i < count($flights); $i++){
                        for ($j = 0; $j < count($passengers); $j++){
                            $tickets[$count]['flight_id']  = $flights[$i]->id;
                            $tickets[$count]['passenger_id'] = $passengers[$j]['id'];
                            $tickets[$count]['seat_location'] = $seats[$count];
                            $price = Ticket_price::where('flight_id','=',$flights[$i]->id)
                                ->where('class_id','=',session('class_id')) ->first()->price;
                            switch ($passengers[$j]['type']){
                                case '1':
                                    $price*=0.6;
                                    break;
                                case '2':
                                    $price*=1;
                                    break;
                                case '3':
                                    $price*=0.8;
                                    break;
                            }
                            $tickets[$count]['price'] = $price;
                            $count++;
                        }
                    }
                }
                elseif (! $seats){
                    for ($i = 0; $i < count($flights); $i++){
                        for ($j = 0; $j < count($passengers); $j++){
                            $tickets[$count]['flight_id']  = $flights[$i]->id;
                            $tickets[$count]['passenger_id'] = $passengers[$j]['id'];
                            $tickets[$count]['seat_location'] = null;
                            $price = Ticket_price::where('flight_id','=',$flights[$i]->id)
                                ->where('class_id','=',session('class_id')) ->first()->price;
                            switch ($passengers[$j]['type']){
                                case '1':
                                    $price*=0.6;
                                    break;
                                case '2':
                                    $price*=1;
                                    break;
                                case '3':
                                    $price*=0.8;
                                    break;
                            }
                            $tickets[$count]['price'] = $price;
                            $count++;
                        }
                    }
                }

                session(['tickets'=>$tickets]);

                $now = Carbon::today('Asia/Ho_Chi_Minh');
                $first_departure = Carbon::parse(session('flights_choose')[0]->departure_date);
                $diff_date = $first_departure->diffInDays($now);
                return view('check_out')->with('diff_date',$diff_date);
            }
            else{
                return redirect('/');
            }
        }
        elseif(session('reschedule')){
            if (session('email') && session('password') && (session('flight_outbound_choose') || session('flight_outbound_from_transit_choose'))
                && session('passengers') && session('total_price') && $request!= null){
                $seats = $request->seat;
                $flights = session('flights_choose');
                $passengers = session('passengers');
                $tickets = array();
                $count = 0;
                if ($seats){
                    for ($i = 0; $i < count($flights); $i++){
                        for ($j = 0; $j < count($passengers); $j++){
                            $tickets[$count]['flight_id']  = $flights[$i]->id;
                            $tickets[$count]['passenger_id'] = $passengers[$j]['id'];
                            $tickets[$count]['seat_location'] = $seats[$count];
                            $price = Ticket_price::where('flight_id','=',$flights[$i]->id)
                                ->where('class_id','=',session('class_id')) ->first()->price;
                            switch ($passengers[$j]['type']){
                                case '1':
                                    $price*=0.6;
                                    break;
                                case '2':
                                    $price*=1;
                                    break;
                                case '3':
                                    $price*=0.8;
                                    break;
                            }
                            $tickets[$count]['price'] = $price;
                            $count++;
                        }
                    }
                }
                elseif (! $seats){
                    for ($i = 0; $i < count($flights); $i++){
                        for ($j = 0; $j < count($passengers); $j++){
                            $tickets[$count]['flight_id']  = $flights[$i]->id;
                            $tickets[$count]['passenger_id'] = $passengers[$j]['id'];
                            $tickets[$count]['seat_location'] = null;
                            $price = Ticket_price::where('flight_id','=',$flights[$i]->id)
                                ->where('class_id','=',session('class_id')) ->first()->price;
                            switch ($passengers[$j]['type']){
                                case '1':
                                    $price*=0.6;
                                    break;
                                case '2':
                                    $price*=1;
                                    break;
                                case '3':
                                    $price*=0.8;
                                    break;
                            }
                            $tickets[$count]['price'] = $price;
                            $count++;
                        }
                    }
                }

                session(['tickets'=>$tickets]);

                $now = Carbon::today('Asia/Ho_Chi_Minh');
                $first_departure = Carbon::parse(session('flights_choose')[0]->departure_date);
                $diff_date = $first_departure->diffInDays($now);
                return view('check_out')->with('diff_date',$diff_date);
            }
            else{
                return redirect('/');
            }
        }

    }

    public function choose_transaction(Request  $request){
        if(!session('reschedule')){
            $order_id = '';
            $order_status = 0;
            $notification = '';

            if (!$request->get('vnp_ResponseCode')){
                if ($request->transaction == 'block'){
                    $x = false;
                    do{
                        $order_id ='BO-';
                        $after_code = Str::upper(Str::random(4)) ;
                        $order_id.=$after_code;
                        $same_order_id = Order::where('id','=',$order_id)->first();
                        if ($same_order_id){
                            $x = false;
                        }
                        else{
                            $x = true;
                        }

                    }
                    while($x == false);

                    $order_status = 2;
                    $mailType = 2;

                }
                elseif ($request->transaction == 'buy'){

                    //01. lay URL thanh toan VNpay
                    $x = false;
                    do{
                        $order_id ='SO-';
                        $after_code = Str::upper(Str::random(4)) ;
                        $order_id.=$after_code;
                        $same_order_id = Order::where('id','=',$order_id)->first();
                        if ($same_order_id){
                            $x = false;
                        }
                        else{
                            $x = true;
                        }
                    }
                    while($x == false);

                    $order_status = 1;
                    $data_url = VNPay::vnpay_create_payment([
                        'vnp_TxnRef' =>  $order_id, //ID cua don hang
                        'vnp_OrderInfo' => 'Thanh toan hoa don mua ve', //mo ta san pham o day
                        'vnp_Amount' => (session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))) *23000 , // doi ra VND
                    ]);
                    //02. Chuyen huowng toi URL lay duoc
//                dd($data_url);
                    return redirect() ->to($data_url);
                }
            }
            elseif ($request->get('vnp_ResponseCode')){
                $vnp_ResponseCode = $request->get('vnp_ResponseCode');
                $vnp_TxnRef = $request->get('vnp_TxnRef');
                if ($vnp_ResponseCode == 00){
                    $order_id = $vnp_TxnRef;
                    $order_status = 1;
                    $mailType = 6;
                }
                else{
                    $notification = 'Somethings is wrong. Please check again! Thanks!';
                    session()->forget('passengers');
                    session()->forget('flights_choose');
                    session()->forget('tickets');
                    return redirect('/')->with('notification',$notification);
                }
            }
            DB::beginTransaction();
            try {
                $account_id = session('check')->id;
                foreach (session('passengers') as $passenger){
                    DB::table('customers')->insert([
                        'id' => $passenger['id'],
                        'firstname' => $passenger['firstname'],
                        'lastname' => $passenger['lastname'],
                        'sex' => $passenger['sex'],
                        'dob' => $passenger['dob'],
                        'account_id' => $account_id
                    ]);
                }
                $flight_route = 0;
                if (!session('date_return')){
                    $flight_route = 1;
                }
                elseif (session('date_return')){
                    $flight_route = 2;
                }
                $total_skymiles = 0;
                $skymile_one_passenger = 0;
                foreach (session('flights_choose') as $flight){
                    $skymile_one_passenger+= $flight->route_direct->skymile;
                }
                $total_skymiles = $skymile_one_passenger * count(session('passengers'));

                DB::table('orders')->insert([
                    'id' => $order_id,
                    'account_id' => $account_id,
                    'order_status'=>$order_status,
                    'total_price'=>(session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))),
                    'total_skymiles'=>$total_skymiles,
                    'flight_route'=>$flight_route
                ]);

                foreach (session('tickets') as $ticket){
                    DB::table('ticket_details')->insert([
                        'flight_id' => $ticket['flight_id'],
                        'seat_location' => $ticket['seat_location'],
                        'order_id' => $order_id,
                        'passenger_id' => $ticket['passenger_id'],
                        'price' => $ticket['price']
                    ]);
                }

                $account = Account::find($account_id);
                $account->sky_miles+=$total_skymiles;
                $account->save();

                DB::commit();
                $notification = 'Booking code: ';
            }  catch (\Exception $e) {
                DB::rollBack();
                $notification = 'Somethings is wrong. Please try again.';
            }
            $mail = new HomeController();
            $array = $mail->getDataForMail($order_id);
            $mail->sendEmail($array,$mailType);
            session()->forget('passengers');
            session()->forget('flights_choose');
            session()->forget('tickets');
            return redirect('/')->with('notification1',$notification)->with('order_id',$order_id);
        }
        elseif (session('reschedule')){

            $old_order = session('old_order');
            $order_id = $old_order['id'];

            if (!$request->get('vnp_ResponseCode')){
                if ($request->transaction == 'block' && $old_order['order_status'] == 2){
                    DB::beginTransaction();
                    try {
                        DB::table('orders')->where('id','=',$old_order['id'])
                            ->update(['total_price'=>(session('total_price')+ 25*session('total_passengers')*count(session('flights_choose')))]);
                        $ticket_details = DB::table('ticket_details')->where('order_id','=',$old_order['id'])
                            ->get();
                        for ($i = 0; $i<count($ticket_details);$i++){
                            DB::table('ticket_details')->where('id','=',$ticket_details[$i]->id)
                                ->update([
                                    'flight_id'=>session('tickets')[$i]['flight_id'],
                                    'seat_location'=>session('tickets')[$i]['seat_location'],
                                    'price'=>session('tickets')[$i]['price']
                                ]);
                        }
                        DB::commit();
                        $notification = 'Successfully updated. Please check your email ';
                    }  catch (\Exception $e) {
                        DB::rollBack();
                        $notification = 'Somethings is wrong. Please try again.';
                        return redirect('/')->with('notification',$notification);
                    }

                }
                elseif ($old_order['order_status'] == 2 && $request->transaction == 'buy'){
                    $data_url = VNPay::vnpay_create_payment([
                        'vnp_TxnRef' => Str::upper(Str::random(10)) , //ID cua don hang
                        'vnp_OrderInfo' => 'Thanh toan hoa don mua ve', //mo ta san pham o day
                        'vnp_Amount' => (session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))) *23000 , // doi ra VND
                    ]);
                    //02. Chuyen huowng toi URL lay duoc

                    return redirect() ->to($data_url);
                }
                elseif ($old_order['order_status'] == 1 && $request->transaction == 'buy'){
                    if ((session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))) <= $old_order['total_price']){
                        DB::beginTransaction();
                        try {
                            DB::table('orders')->where('id','=',$old_order['id'])
                                ->update(['total_price'=>(session('total_price')+ 25*session('total_passengers')*count(session('flights_choose')))
                                ]);
                            $ticket_details = DB::table('ticket_details')->where('order_id','=',$old_order['id'])
                                ->get();
                            for ($i = 0; $i<count($ticket_details);$i++){
                                DB::table('ticket_details')->where('id','=',$ticket_details[$i]->id)
                                    ->update([
                                        'flight_id'=>session('tickets')[$i]['flight_id'],
                                        'seat_location'=>session('tickets')[$i]['seat_location'],
                                        'price'=>session('tickets')[$i]['price']
                                    ]);
                            }
                            DB::commit();
                            $notification = 'Successfully updated. Please check your email ';
                        }  catch (\Exception $e) {
                            DB::rollBack();
                            $notification = 'Somethings is wrong. Please try again.';
                            return redirect('/')->with('notification',$notification);
                        }
                    }
                    else{
                        $data_url = VNPay::vnpay_create_payment([
                            'vnp_TxnRef' => Str::upper(Str::random(10)) , //ID cua don hang
                            'vnp_OrderInfo' => 'Thanh toan hoa don mua ve', //mo ta san pham o day
                            'vnp_Amount' => (session('total_price')+ 25*session('total_passengers')*count(session('flights_choose')) - $old_order['total_price']) *23000 , // doi ra VND
                        ]);
                        //02. Chuyen huowng toi URL lay duoc

                        return redirect() ->to($data_url);
                    }
                }
            }
            elseif ($request->get('vnp_ResponseCode')){
                if ($old_order['order_status'] == 2){
                    $vnp_ResponseCode = $request->get('vnp_ResponseCode');
                    $vnp_TxnRef = $request->get('vnp_TxnRef');
                    if ($vnp_ResponseCode == 00){
                        $mailType =6;
                        DB::beginTransaction();
                        try {
                            DB::table('orders')->where('id','=',$old_order['id'])
                                ->update(['total_price'=>(session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))),
                                    'order_status'=>1
                                ]);
                            $ticket_details = DB::table('ticket_details')->where('order_id','=',$old_order['id'])
                                ->get();
                            for ($i = 0; $i<count($ticket_details);$i++){
                                DB::table('ticket_details')->where('id','=',$ticket_details[$i]->id)
                                    ->update([
                                        'flight_id'=>session('tickets')[$i]['flight_id'],
                                        'seat_location'=>session('tickets')[$i]['seat_location'],
                                        'price'=>session('tickets')[$i]['price']
                                    ]);
                            }
                            DB::commit();
                            $notification = 'Successfully updated. Please check your email ';
                        }  catch (\Exception $e) {
                            DB::rollBack();
                            $notification = 'Somethings is wrong. Please try again.';
                            return redirect('/')->with('notification',$notification);
                        }
                    }  else{
                        $notification = 'Somethings is wrong. Please check again! Thanks!';
                        session()->forget('passengers');
                        session()->forget('flights_choose');
                        session()->forget('tickets');
                        return redirect('/')->with('notification',$notification);
                    }

                    }

                elseif ($old_order['order_status'] == 1){
                    $vnp_ResponseCode = $request->get('vnp_ResponseCode');
                    $vnp_TxnRef = $request->get('vnp_TxnRef');
                    if ($vnp_ResponseCode == 00){
                        $mailType =6;
                        DB::beginTransaction();
                        try {
                            DB::table('orders')->where('id','=',$old_order['id'])
                                ->update(['total_price'=>(session('total_price')+ 25*session('total_passengers')*count(session('flights_choose'))),
                                ]);
                            $ticket_details = DB::table('ticket_details')->where('order_id','=',$old_order['id'])
                                ->get();
                            for ($i = 0; $i<count($ticket_details);$i++){
                                DB::table('ticket_details')->where('id','=',$ticket_details[$i]->id)
                                    ->update([
                                        'flight_id'=>session('tickets')[$i]['flight_id'],
                                        'seat_location'=>session('tickets')[$i]['seat_location'],
                                        'price'=>session('tickets')[$i]['price']
                                    ]);
                            }
                            DB::commit();
                            $notification = 'Successfully updated. Please check your email ';
                        }  catch (\Exception $e) {
                            DB::rollBack();
                            $notification = 'Somethings is wrong. Please try again.';
                            return redirect('/')->with('notification',$notification);
                        }
                    }  else{
                        $notification = 'Somethings is wrong. Please check again! Thanks!';
                        session()->forget('passengers');
                        session()->forget('flights_choose');
                        session()->forget('tickets');
                        return redirect('/')->with('notification',$notification);
                    }

                }

            }

            $mail = new HomeController();
            $mailType = 7;
            $array = $mail->getDataForMail($order_id);
            $mail->sendEmail($array,$mailType);
            session()->forget('passengers');
            session()->forget('flights_choose');
            session()->forget('tickets');
            return redirect('/')->with('notification',$notification);

        }
    }
}
