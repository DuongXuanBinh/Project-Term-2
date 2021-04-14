<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Plane_type;
use App\Models\Route_direct;
use App\Models\Ticket_details;
use App\Models\Ticket_price;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use SebastianBergmann\CodeCoverage\Filter;
use Carbon\Carbon;


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

        // HANDLER DATE

        $origin_airport = Airport::where('name', '=', $request->place_from)->first();
        $arrival_airport = Airport::where('name', '=', $request->place_to)->first();
        $flight_from_transit_outbound = collect();
        $flight_transit_to_outbound = collect();
        $flight_from_transit_inbound = collect();
        $flight_transit_to_inbound = collect();
        $flight_return = collect();
        // IF HAVE ROUTE DIRECT
        // flight outbound
        if ($origin_airport != null &   $arrival_airport!= null){
            $route_outbound = Route_direct::where('origin_airportid', '=', $origin_airport->id)
                ->where('arrival_airportid', '=', $arrival_airport->id)
                ->first();
            session(['place_from'=>$request->place_from, 'place_to'=>$request->place_to,
                'date_outbound'=>$request->date_outbound,'date_return'=>$request->date_return,
                'class_id'=>$request->travel_class,'adult'=>$request->adult,
                'children'=>$request->children,'senior'=>$request->senior
            ]);
            if ($route_outbound != null){
                session(['route_outbound_id '=>$route_outbound->id]);
            }
            if ($route_outbound) {
                $flight_outbound = Flight::where('route_id', '=', $route_outbound->id)
                    ->whereDate('departure_date', '=', $request->date_outbound)
                    ->take(30)->get();

                //HANDLER DAY HAVE FLIGHTS

//            $flight_other_outbound =  DB::table('flights')
//                ->select(DB::raw('flights.statusid, flights.route_id ,DATE(departure_date) as departure_date'))
//                ->where('statusid','=',1)
//                ->where('route_id','=',$route_outbound->id)
//                ->distinct()
//                ->get();
//            $other_outbound_days =collect();
//            $other_return_days =collect();
//            foreach ($flight_other_outbound as $flights){
//                $other_outbound_days->push($flights->departure_date);
//            }


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
                return view('flight select');
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
                return view('flight select transit');
            }
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
            foreach (session('outbound_details') as $outbound_detail ){

                $output_outbound .= '<div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" name="flight_outbound" value="'.$outbound_detail->id.'" >
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
            foreach (session('return_details') as $return_detail){
                $output_return .= '<div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" name="flight_return" value="'.$return_detail->id.'" >

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
            for ($i = 0; $i< count(session('from_transit_outbound_details')); $i++){
                $output_outbound_transit.= '<div class="row col-md-12 flight-detail" style="height: 130px">
                    <div class="col-md-1">
                        <input type="radio" name="flight_outbound_from_transit" value="'.session("from_transit_outbound_details")[$i]->id.'" style="height: 70px;cursor: pointer">
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
            for ($i = 0; $i< count(session('from_transit_inbound_details')); $i++){
                $output_return_transit.= '<div class="row col-md-12 flight-detail" style="height: 130px">
                    <div class="col-md-1">
                        <input type="radio" name="flight_return_from_transit" value="'.session("from_transit_inbound_details")[$i]->id.'" style="height: 70px;cursor: pointer">
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

        return redirect('/booking/passenger_index');
    }

    public function passenger_index(){

        $this->fare_detail();

        return view('passengers');
    }

    public function fare_detail(){
        $flight=array();
        $total_price = 0;
        $total_passengers = session('adult') + session('children') + session('senior');
        if (session('flight_outbound_choose')){
            $flight[0] = Flight::where('id','=',session('flight_outbound_choose'))->first();

            $flight[0]['price'] = Ticket_price::where('flight_id','=',$flight[0]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $flight[0]['place_from'] = session('place_from');

            $flight[0]['place_to'] = session('place_to');

            $total_price+= $flight[0]['price'];

            if (session('flight_return_choose')){
                $flight[1] = Flight::where('id','=',session('flight_return_choose'))->first();

                $flight[1]['price'] = Ticket_price::where('flight_id','=',$flight[1]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[1]['place_from'] = session('place_from');

                $flight[1]['place_to'] = session('place_to');

                $total_price+= $flight[1]['price'];
            }
        }
        elseif (session('flight_outbound_from_transit_choose')) {
            $flight[0] = Flight::where('id','=',session('flight_outbound_from_transit_choose'))->first();

            $flight[0]['price'] = Ticket_price::where('flight_id','=',$flight[0]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $flight[0]['place_from'] = session('place_from');

            $flight[0]['place_to'] = session('place_to');

            $total_price+= $flight[0]['price'];


            $flight[1] = Flight::where('id','=',session('flight_outbound_transit_to_choose'))->first();

            $flight[1]['price'] = Ticket_price::where('flight_id','=',$flight[1]['id'])
                ->where('class_id','=',session('class_id')) ->first()->price;

            $flight[1]['place_from'] = session('place_from');

            $flight[1]['place_to'] = session('place_to');

            $total_price+= $flight[1]['price'];


            if (session('flight_return_from_transit_choose')){
                $flight[3] = Flight::where('id','=',session('flight_return_from_transit_choose'))->first();

                $flight[3]['price'] = Ticket_price::where('flight_id','=',$flight[3]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[3]['place_from'] = session('place_from');

                $flight[3]['place_to'] = session('place_to');

                $total_price+= $flight[3]['price'];


                $flight[4] = Flight::where('id','=',session('flight_return_transit_to_choose'))->first();

                $flight[4]['price'] = Ticket_price::where('flight_id','=',$flight[4]['id'])
                    ->where('class_id','=',session('class_id')) ->first()->price;

                $flight[4]['place_from'] = session('place_from');

                $flight[4]['place_to'] = session('place_to');

                $total_price+= $flight[4]['price'];
            }

        }
        session(['flights_choose'=>$flight,'total_price'=>$total_price,'total_passengers'=>$total_passengers]);
    }

    public function create_passengers(Request $request){

        dd($request);
    }


}
