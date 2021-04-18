@extends('layout.normal')
@section('title','Seat')

@section('body')
    <?php
    $flights = session('flights_choose');
    $class = session('class_id');
    $passengers = session('passengers');
    $i = 0;
    $j = 0;
    ?>
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/HEL_Popup_Teaser_E22.jpg); height: 400px">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div style="margin-top: 10em" class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
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
                        <button type="button" name="selectflight" class="first-button btn btn-secondary">Select flight</button>
                        <button type="button" name="passenger" class="second-button btn btn-secondary ">Passenger</button>
                        <button type="button" name="pickseat" class="second-button btn btn-secondary">Pick a seat</button>
                        <button type="button" name="checkout" class="second-button btn btn-secondary disable-button">Check out</button>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <h2 style="text-align: center;letter-spacing: 2px;margin-top: 20px">PICK A SEAT</h2>
            </div>
        </div>
    </div>

    <div class="gtco-container select_seats">
        <form method="get" action="./booking/select_seats" >
            <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                    <div class="col-md-9">
                        <ul class="row nav nav-tabs " style="border-bottom: none !important;">

                            @foreach($flights as $flight)
                                @if($i == 0)
                                    <li class="flight_{{$i}}_tab col-md-6 active"><a data-toggle="tab" href="#flight_{{$i}}">({{$flight->id}})  {{$flight->place_from}} to {{$flight->place_to}}</a></li>
                                    <?php $i++ ?>
                                @elseif($i != 0)
                                    <li class="flight_{{$i}}_tab col-md-6" ><a data-toggle="tab" href="#flight_{{$i}}">({{$flight->id}})  {{$flight->place_from}} to {{$flight->place_to}}</a></li>
                                    <?php $i++ ?>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($flights as $flight)
                                @if($j== 0)
                                    <div class="tab-pane active" id="flight_{{$j}}">

                                            @foreach($flight->ticket_details as $ticket)
                                                <input type="hidden" name="seat_location" value="{{$ticket->seat_location}}">
                                            @endforeach
                                            <div class="row" style="display: flex">
                                                <div class="col-md-4" style="margin: auto 0;">
                                                    @if($flight->plane_type == '1')
                                                        @include('320_142seats')
                                                    @elseif($flight->plane_type == '2')
                                                        @include('787_235seats')
                                                    @endif
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="row  seat-note">
                                                        <p style="margin-top: 20px;margin-bottom: 0">Note:</p>
                                                    </div>

                                                    <div class="row  seat-note">
                                                        <div class="col-md-5 seat-img">
                                                            <div class="row col-md-12">
                                                                <p><img src="front/images/icon-premium-seat0.png" alt="">First Class</p>
                                                            </div>
                                                            <div class="row col-md-12">
                                                                <p><img src="front/images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                            </div>
                                                            <div class="row col-md-12">
                                                                <p><img src="front/images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <p>To request your seat, please click on the seat you would like on the map. Your seat selection cannot be confirmed until you finish your purchase. The preferred seat fee will not be refunded. If you do not select a seat, your seat will be automatically assigned within 25 hours before departure.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-left: 20px;margin-top: 40px">
                                                        <?php $p=0 ?>
                                                        @foreach($passengers as $passenger)

                                                            <div class="row col-md-12 select_seat_passenger" id="passenger_{{$p}}">
                                                                <div class="col-md-2"><span>
                                                                @if($passenger['sex'] === 'Male')
                                                                            {{'Mr'}}
                                                                        @else
                                                                            {{'Mrs'}}
                                                                        @endif
                                                                .</span></div>
                                                                <div class="col-md-7">{{$passenger['firstname']}} {{$passenger['lastname']}}</div>
                                                                <div class="col-md-3" style="padding: 0">
                                                                    <p class="btn_select_seat">(Select Seat)</p>
                                                                    <input type="hidden" name="seat[]">
                                                                </div>
                                                            </div>
                                                            <?php $p++ ?>
                                                        @endforeach
                                                    </div>

                                                    <div class="row col-md-12">
                                                        <span class="seat-note">* Please read out our policy carefully.</span><br>
                                                        <span class="seat-note">* Once picked a seat, you can not change.</span>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <?php $j++ ?>
                                @else
                                    <div class="tab-pane" id="flight_{{$j}}">
                                        @foreach($flight->ticket_details as $ticket)
                                            <input type="hidden" name="seat_location" value="{{$ticket->seat_location}}">
                                        @endforeach
                                        <div class="row" style="display: flex">
                                            <div class="col-md-4" style="margin: auto 0;">
                                                @if($flight->plane_type == '1')
                                                    @include('320_142seats')
                                                @elseif($flight->plane_type == '2')
                                                    @include('787_235seats')
                                                @endif
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row  seat-note">
                                                    <p style="margin-top: 20px;margin-bottom: 0">Note:</p>
                                                </div>
                                                <div class="row  seat-note">
                                                    <div class="col-md-5 seat-img">
                                                        <div class="row col-md-12">
                                                            <p><img src="front/images/icon-premium-seat0.png" alt="">First Class</p>
                                                        </div>
                                                        <div class="row col-md-12">
                                                            <p><img src="front/images/icon-premium-seat2.png" alt="">Economy Class</p>
                                                        </div>
                                                        <div class="row col-md-12">
                                                            <p><img src="front/images/icon-unavailable-seat.png" alt="">Unavailable Seat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p>To request your seat, please click on the seat you would like on the map. Your seat selection cannot be confirmed until you finish your purchase. The preferred seat fee will not be refunded. If you do not select a seat, your seat will be automatically assigned within 25 hours before departure.</p>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 20px;margin-top: 40px">
                                                    <?php $p=0 ?>
                                                    @foreach($passengers as $passenger)

                                                        <div class="row col-md-12 select_seat_passenger" id="passenger_{{$p}}">
                                                            <div class="col-md-2"><span>
                                                                @if($passenger['sex'] === 'Male')
                                                                        {{'Mr'}}
                                                                    @else
                                                                        {{'Mrs'}}
                                                                    @endif
                                                                .</span></div>
                                                            <div class="col-md-7">{{$passenger['firstname']}} {{$passenger['lastname']}}</div>
                                                            <div class="col-md-3" style="padding: 0">
                                                                <p class="btn_select_seat">(Select Seat)</p>
                                                                <input type="hidden" name="seat[]">
                                                            </div>
                                                        </div>
                                                        <?php $p++ ?>
                                                    @endforeach
                                                </div>
                                                <div class="row col-md-12">
                                                    <span class="seat-note">* Please read out our policy carefully.</span><br>
                                                    <span class="seat-note">* Once picked a seat, you can not change.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $j++ ?>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 flight_detail">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            @foreach(session('flights_choose') as $flight)
                                <table>
                                    <tr>
                                        <th colspan="4">{{$flight->id}} --- {{Carbon\Carbon::parse($flight->departure_date)->format('d/m/Y')}}</th>
                                    </tr>
                                    <tr class="row">
                                        <td class="col-md-5">{{$flight->place_from}}</td>
                                        <td class="col-md-2" rowspan="2"><img src="front/images/429706-84%20-%20Copy.png" alt=""></td>
                                        <td class="col-md-5">{{$flight->place_to}}</td>
                                    </tr>
                                    <tr  class="row">
                                        <td class="col-md-5">{{Carbon\Carbon::parse($flight->departure_date)->format('H:i')}}</td>
                                        <td class="col-md-5">{{Carbon\Carbon::parse($flight->arrival_date)->format('H:i')}}</td>
                                    </tr>
                                </table>
                            @endforeach
                            <table>
                                <tr>
                                    <th colspan="2">Passenger</th>
                                </tr>
                                @foreach(session('passengers') as $passenger)
                                    <tr>
                                        <td>@if($passenger['sex'] === 'Male')
                                                {{'Mr'}}
                                            @else
                                                {{'Mrs'}}
                                            @endif
                                            .</td>
                                        <td>{{$passenger['firstname']}} {{$passenger['lastname']}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <table>
                                    <tr>
                                        <th colspan="3">Fare Details</th>
                                    </tr>
                                    <tr>
                                        <td>Ticket Fare</td>

                                        <td>USD {{session('total_price_one')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Airport Tax Domestic</td>

                                        <td>USD {{10*count(session('flights_choose'))}}</td>
                                    </tr>
                                    <tr>
                                        <td>Admin Fee</td>

                                        <td>USD {{5*count(session('flights_choose'))}}</td>
                                    </tr>
                                    <tr>
                                        <td>Airport Security</td>

                                        <td>USD {{5*count(session('flights_choose'))}}</td>
                                    </tr>
                                    <tr>
                                        <td>System Admin</td>

                                        <td>USD {{5*count(session('flights_choose'))}}</td>
                                    </tr>
                                    <tr>
                                        <td>Passenger Number</td>
                                        <td colspan="2">{{session('total_passengers')}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Subtotal</b></td>
                                        <td colspan="2"><b>USD {{session('total_price') +( 25*session('total_passengers')*count(session('flights_choose')))}}</b></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="row back-continue">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button class="btn btn-secondary" type="button"><a href="./booking/passenger_index">Back</a></button>
                        <button  class="btn btn-primary"  type="submit">Continue</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
