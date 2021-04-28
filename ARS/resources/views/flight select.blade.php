@extends('layout.normal')
@section('title','Flight')

@section('body')

        <div class="modal fade password-change"  id="notification_" role="dialog" data-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content" style="top: 100px">
                    <div class="modal-header">
                        <h5 class="modal-title" style="margin-left: 217px">NOTIFICATION</h5>
                        <button type="button" style="margin-top: -24px" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align: center">
                        <p style="margin-bottom: 0">You have not sign-in yet? Please sign-in to continue </p>
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="select_flight_sign_in" type="button" class="btn btn-primary">Sign-in</button>
                    </div>
                </div>
            </div>
        </div>

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/HEL_Popup_Teaser_E22.jpg); height: 400px">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div style="top: 100px" class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>If not now, then when?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <div class="gtco-container">
        <div class="col-md-12 mt-text animate-box"  style="background-color: #ecebeb82" data-animate-effect="fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group  booking-progress" role="group" aria-label="Basic example">
                        <button type="button" name="selectflight" class="first-button btn btn-secondary">Pick a flight</button>
                        <button type="button" name="passenger" class="second-button btn btn-secondary disable-button">Passenger</button>
                        <button type="button" name="pickseat" class="second-button btn btn-secondary disable-button">Pick a seat</button>
                        <button type="button" name="checkout" class="second-button btn btn-secondary disable-button">Check out</button>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <h2 style="text-align: center;letter-spacing: 2px;margin-top: 20px">SELECT A FLIGHT</h2>
            </div>
        @if(!session('outbound_details') & !session('from_transit_outbound_details'))
            <h2 style="text-align: center;
    padding: 200px;"> No Flights Found. Please try later!</h2>
        @else
            <!--        OUT-->
            <div class="row">
                <div class="col-md-10">
                    <h3>Outbound</h3>
                </div>
                <div class="col-md-2" STYLE="text-align: right">
                    <a href="" style="text-align: right; color: black"><svg class="svg-icon back-icon" viewBox="0 0 20 20">
                            <path style="fill: black" fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
                        </svg>Back</a>
                </div>
            </div>
            <form action="./booking/choose_flight" id="form_choose_flight" method="get" >
                <div class="row col-md-12" >
                    <div class="btn-group group1 btn_other_outbound" style="display: flex" role="group" aria-label="Basic example">
                        <div>
                            <input  type="hidden" name="other_day_outbound" value="{{Carbon\Carbon::parse(session('date_outbound'))->setDay(Carbon\Carbon::parse(session('date_outbound'))->day -2)}}">
                            <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_outbound'))->addDays(-2)->day}}/{{Carbon\Carbon::parse(session('date_outbound'))->addDays(-2)->month}} <br></button>
                        </div>
                        <div>
                            <input type="hidden" name="other_day_outbound" value="{{Carbon\Carbon::parse(session('date_outbound'))->setDay(Carbon\Carbon::parse(session('date_outbound'))->day -1)}}">
                            <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_outbound'))->addDays(-1)->day}}/{{Carbon\Carbon::parse(session('date_outbound'))->addDays(-1)->month}} <br></button>

                        </div>
                        <div>
                            <input type="hidden" name="other_day_outbound" value="{{Carbon\Carbon::parse(session('date_outbound'))}}">
                            <button type="button" class="date-button btn btn-secondary active">{{Carbon\Carbon::parse(session('date_outbound'))->day}}/{{Carbon\Carbon::parse(session('date_outbound'))->month}} <br></button>

                        </div>
                        <div>
                            <input type="hidden" name="other_day_outbound" value="{{Carbon\Carbon::parse(session('date_outbound'))->setDay(Carbon\Carbon::parse(session('date_outbound'))->day +1)}}">
                            <button type="button" class="date-button btn btn-secondary  ">{{Carbon\Carbon::parse(session('date_outbound'))->addDays(+1)->day}}/{{Carbon\Carbon::parse(session('date_outbound'))->addDays(1)->month}} <br></button>

                        </div>
                        <div>
                            <input type="hidden" name="other_day_outbound" value="{{Carbon\Carbon::parse(session('date_outbound'))->setDay(Carbon\Carbon::parse(session('date_outbound'))->day +2)}}">
                            <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_outbound'))->addDays(2)->day}}/{{Carbon\Carbon::parse(session('date_outbound'))->addDays(2)->month}} <br></button>

                        </div>
                    </div>

                </div>
                <!--            FLIGHTS OUTBOUND-->
                <div class="outbound_flights">
                    @foreach(session('outbound_details') as $outbound_detail)
                        <div class="row col-md-12 flight-detail">
                            <div class="col-md-1">
                                <input type="radio" required name="flight_outbound" value="{{$outbound_detail->id}}"  >
                            </div>

                            <div class="col-md-11">
                                <table>
                                    <tr>
                                        <td rowspan="2">{{$outbound_detail->id}}</td>
                                        <td>{{session('place_from')}} &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;{{session('place_to')}}</td>
                                        <td>Date:</td>
                                        <td>{{Carbon\Carbon::parse($outbound_detail->departure_date)->format('d/m/Y')}}</td>
                                        <td>Departure:</td>
                                        <td>{{Carbon\Carbon::parse($outbound_detail->departure_date)->format('H:i')}}</td>
                                        <td rowspan="2">USD {{$outbound_detail->price}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$outbound_detail->seats_left}} seat(s) left</td>
                                        <td>Duration: </td>
                                        <td>{{$outbound_detail->duration}} hour(s)</td>
                                        <td>Arrival:</td>
                                        <td>{{Carbon\Carbon::parse($outbound_detail->arrival_date)->format('H:i')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--     FLIGHTS INBOUND-->
                @if(session('date_return'))
                    <div class="row col-md-12">
                        <h3>Inbound</h3>
                    </div>
                    <div class="row col-md-12">
                        <div class="btn-group group2 btn_other_return" style="display: flex" role="group" aria-label="Basic example">
                            <div>
                                <input  type="hidden" name="other_day_return" value="{{Carbon\Carbon::parse(session('date_return'))->setDay(Carbon\Carbon::parse(session('date_return'))->day -2)}}">
                                <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_return'))->addDays(-2)->day}}/{{Carbon\Carbon::parse(session('date_return'))->addDays(-2)->month}} <br></button>
                            </div>
                            <div>
                                <input type="hidden" name="other_day_return" value="{{Carbon\Carbon::parse(session('date_return'))->setDay(Carbon\Carbon::parse(session('date_return'))->day -1)}}">
                                <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_return'))->addDays(-1)->day}}/{{Carbon\Carbon::parse(session('date_return'))->addDays(-1)->month}} <br></button>

                            </div>
                            <div>
                                <input type="hidden" name="other_day_return" value="{{Carbon\Carbon::parse(session('date_return'))}}">
                                <button type="button" class="date-button btn btn-secondary active">{{Carbon\Carbon::parse(session('date_return'))->day}}/{{Carbon\Carbon::parse(session('date_return'))->month}} <br></button>

                            </div>
                            <div>
                                <input type="hidden" name="other_day_return" value="{{Carbon\Carbon::parse(session('date_return'))->setDay(Carbon\Carbon::parse(session('date_return'))->day +1)}}">
                                <button type="button" class="date-button btn btn-secondary  ">{{Carbon\Carbon::parse(session('date_return'))->addDays(1)->day}}/{{Carbon\Carbon::parse(session('date_return'))->addDays(1)->month}} <br></button>

                            </div>
                            <div>
                                <input type="hidden" name="other_day_return" value="{{Carbon\Carbon::parse(session('date_return'))->setDay(Carbon\Carbon::parse(session('date_return'))->day +2)}}">
                                <button type="button" class="date-button btn btn-secondary ">{{Carbon\Carbon::parse(session('date_return'))->addDays(2)->day}}/{{Carbon\Carbon::parse(session('date_return'))->addDays(2)->month}} <br></button>

                            </div>
                        </div>
                    </div>
                    <!--            cac chuyen bay-->
                    <div class="return_flights">
                        @foreach(session('return_details') as $return_detail)
                            <div class="row col-md-12 flight-detail">
                                <div class="col-md-1">
                                    <input type="radio" required name="flight_return" value="{{$return_detail->id}}" >
                                </div>

                                <div class="col-md-11">
                                    <table>
                                        <tr>
                                            <td rowspan="2">{{$return_detail->id}}</td>
                                            <td>{{session('place_to')}} &nbsp;&nbsp;&nbsp;<img src="front/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;{{session('place_from')}}</td>
                                            <td>Date:</td>
                                            <td>{{Carbon\Carbon::parse($return_detail->departure_date)->format('d/m/Y')}}</td>
                                            <td>Departure:</td>
                                            <td>{{Carbon\Carbon::parse($return_detail->departure_date)->format('H:i')}}</td>
                                            <td rowspan="2">USD {{$return_detail->price}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$return_detail->seats_left}} seat(s) left</td>
                                            <td>Duration: </td>
                                            <td>{{$return_detail->duration}} hour(s)</td>
                                            <td>Arrival:</td>
                                            <td>{{Carbon\Carbon::parse($return_detail->arrival_date)->format('H:i')}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif
                {{--END FLIGHT INBOUND--}}

                <div class="row back-continue">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <a href="./"><button class="btn btn-secondary" type="button">Back</button></a>
                        @if(session('check'))
                            <button class="btn btn-primary" type="submit" >Continue</button>
                        @elseif(!session('check'))
                            <button class="btn btn-primary" id="btn_check_sign_in" data-toggle="modal" data-target="#notification_" >Continue</button>
                        @endif
                    </div>

                </div>
                <br>
            </form>
        </div>
        @endif
@endsection
