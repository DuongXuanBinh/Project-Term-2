<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Airport;
use App\Models\Customer;
use App\Models\Flight;
use App\Models\Order;
use App\Models\Ticket_details;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        session()->forget('date_return');
        session()->forget('no_flight');
        session()->forget('flight_outbound_choose');
        session()->forget('flight_outbound_from_transit_choose');
        session()->forget('passengers');
        session()->forget('total_price');
        session()->forget(['code','way','account','price','passengers','flights',
            'ori_airports','arr_airports','plnaeId','duration']);
        $airports = Airport::all();

        return view('index')->with('airports',$airports);
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
        session('page','manage');
        if (session('email') && session('password')) {
            session()->forget('page');
            session(['code'=>$code]);
            $order = Order::where('id',strtoupper($code))->where('account_id',session('check')->id)->first();
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
           return back()->with('manage-notif','You have to sign in to search your booking details');
        }
    }
    public function bookingDelete(Request $request)
    {
        $code = $request->get('booking_code');
        $mile = Order::select('total_skymiles')->where('id', $code)->first();
        $status = Order::select('order_status')->where('id', $code)->first();
        $order = Order::where('id', $code)->first();
        $account = Account::where('id', session('check')->id)->first();
        $account->sky_miles=$account->sky_miles - $mile->total_skymiles;
        $ticket = $order->ticket_details;
        $passenger = array();
        $customer = array();
//        dd($code,$status,$mile);
        if ($status->order_status == 1) {
            $mailType = 5;
        }
        if ($status->order_status == 2) {
            $mailType = 1;
        }
        $array = session('array',$this->getDataForMail($code));
//        DB::beginTransaction();
//        try{
//            for ($i=0;$i<count($ticket);$i++){
//                $passenger[$i] = $ticket[$i]->customer->id;
//            }
//            $passengers = array_values(array_unique($passenger));
//            for($i=0;$i<count($passengers);$i++){
//                $customer[$i]=Customer::where('id',$passengers[$i])->first();
//                $customer[$i]->delete();
//            }
//            $order->delete();
//            $account->save();
//            DB::commit();
//        }catch (\Exception $e){
//            DB::rollBack();
//            return redirect('/')->with('notification', 'Something is wrong. Please try again');
//        }
        $this->sendEmail($array,$mailType);
        return redirect('/')->with('notification', 'Your booking has been cancelled. Please check your email');
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
            $arr_date = null;
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
        $pass->create_rechedule($require,$passengers,$order->toArray());
    }

    public function getDataForMail($code){
        $order = Order::where('id',strtoupper($code))->where('account_id',session('check')->id)->first();
        $way = $order->flight_route;
        $account = $order->account;
        $tickets = $order->ticket_details;
        $passenger = array();
        $flight = array();
        $ori_airports = array();
        $arr_airports = array();
        $planeId = array();
        $plane_type = array();
        $duration = array();
        for ($i = 0; $i < count($tickets); $i++) {
            $passenger[$i] = $tickets[$i]->customer;
            $flight[$i] = $tickets[$i]->flight;
        }
        $total = $order->total_price;
        $flights = array_values(array_unique($flight));
        $passengers = array_values(array_unique($passenger));
        $price = $total - 25*count($flights)*count($passengers);
        usort($flights, function ($a, $b){
            if(strtotime($a->departure_date)==strtotime($b->departure_date))
                return 0;
            return  (strtotime($a->departure_date)<strtotime($b->departure_date)) ? -1 : 1;
        });

        for($i=0;$i<count($flights);$i++){
            $planeId[$i]=$flight[$i]->plane;
            $plane_type[$i]=$planeId[$i]->plane_types->name;
            $duration[$i]=$flight[$i]->route_direct->duration;
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
        return ['way'=>$way,
                'passengers'=>$passengers,
                'duration'=>$duration,
                'plane_type'=>$plane_type,
                'account'=>$account,
                'ori_airports'=>$ori_airports,
                'arr_airports'=>$arr_airports,
                'code'=>$code,
                'flights'=>$flights,
                'price'=>$price];
    }

    public function sendEmail($array,$mailType){
        $code = $array['code'];
        $way = $array['way'];
        $account= $array['account'];
        $price = $array['price'];
        $passengers= $array['passengers'];
        $flights = $array['flights'];
        $ori_airports = $array['ori_airports'];
        $arr_airports = $array['arr_airports'];
        $plane_type = $array['plane_type'];
        $duration =$array['duration'];
        $email_to = $account->email;
        $name = $account->lastname;
//        dd($duration,$plane_type,$flights,$arr_airports,$ori_airports,$passengers,$account,$code,$way,$price,$mailType);
        if($mailType==1) {
            Mail::send('mail.block_cancel', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
            ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('Cancel Confirmation');
            });
        }elseif ($mailType==2){
            Mail::send('mail.block_confirm', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('Block Confirmation');
            });
        }elseif ($mailType==3){
            Mail::send('mail.cancel_inform', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('!!!Cancel Notification!!!');
            });
        }elseif ($mailType==4){
            Mail::send('mail.delay_inform', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('!!!Delay Inform!!!');
            });
        }elseif ($mailType==5){
            Mail::send('mail.purchase_cancel', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('Cancel Confirmation');
            });
        }elseif ($mailType==6){
            Mail::send('mail.purchase_confirm', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('Booking Confirmation');
            });
        }elseif ($mailType==7){
            Mail::send('mail.reschedule', compact('code', 'way','account','price','passengers','flights','ori_airports','arr_airports'
                ,'plane_type','duration'), function ($message) use ($name, $email_to) {
                $message->from('xuanbinh1011@gmail.com', 'Helvetic Airline');
                $message->to($email_to, $name);
                $message->subject('Reschedule Confirmation');
            });
        }

    }

}
