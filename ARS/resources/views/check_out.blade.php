@extends('layout.normal')
@section('title','Checkout')

@section('body')
<?php
    $old_order_status = 0;
if (session('old_order')){
    $old_order_status = session('old_order')['order_status'];
}
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
                    <button type="button" class="first-button btn btn-secondary ">Select flight</button>
                    <button type="button" class="second-button btn btn-secondary ">Passenger</button>
                    <button type="button" class="second-button btn btn-secondary ">Pick a seat</button>
                    <button type="button" class="second-button btn btn-secondary ">Check out</button>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <h2 style="text-align: center;letter-spacing: 2px;margin-top: 20px">CHECKOUT</h2>
        </div>
    </div>
</div>



<div class="gtco-container check_out">

    <form method="get" action="./booking/transaction">
    <div class="col-md-12 mt-text animate-box" style="padding: 0" data-animate-effect="fadeInUp">
        <div class="row" style="margin: 20px 0 20px;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="post" >
                            @if(!session('reschedule'))
                                <div class="row">
                                @if($diff_date >= 2)
                                    <div class="col-md-12 radio_choose radio_block ">
                                    <div class="row">
                                        <div class="form-check col-md-12">
                                            <input class="form-check-input" required type="radio" name="transaction" value="block" id="block_ticket">
                                            <label class="form-check-label" for="block_ticket">
                                                BLOCK
                                            </label>
                                        </div>
                                        <div class="col-md-9" style="margin-top: 15px">
                                            Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                            at least 2 days before departure, your block seat will be automatically cancelled.
                                        </div>
                                        <div class="col-md-3" style="margin-top: 15px">
                                            <p>Your payment deadline:</p>
                                            <p class="deadline-date">23:59 {{Carbon\Carbon::parse(session('flights_choose')[0]->departure_date)->setDay(Carbon\Carbon::parse(session('flights_choose')[0]->departure_date)->day -2)->format('d/m/Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                                @elseif($diff_date >=0 && $diff_date < 2)
                                    <div class="col-md-12 radio_choose radio_block not_allow ">
                                        <div class="row">
                                            <div class="form-check col-md-12">
                                                <input class="form-check-input"   type="radio" name="transaction" value="block" id="block_ticket">
                                                <label class="form-check-label" for="block_ticket">
                                                    BLOCK
                                                </label>
                                            </div>
                                            <div class="col-md-9" style="margin-top: 15px">
                                                Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                                at least 2 days before departure, your block seat will be automatically cancelled.
                                            </div>
                                            <div class="col-md-3" style="margin-top: 15px">
                                                <p style="color: darkred; text-align: center">You are not allowed to block tickets</p>
                                                <p class="deadline-date"></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12 radio_choose_active radio_choose radio_buy">
                                    <div class="row">
                                        <div class="form-check col-md-12">
                                            <input class="form-check-input" type="radio" required name="transaction" value="buy" id="buy_ticket" checked>
                                            <label class="form-check-label" for="buy_ticket">
                                                PURCHASE WITH <img src="front/images/Logo-VNPAYQR-update.png" width="80" alt="">
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <p style="margin-top: 15px">
                                                Feel the comfortability with our online payment in co-operate with VNPay

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(session('reschedule'))
                                @if($old_order_status == 2)
                                    <div class="row">
                                        @if($diff_date >= 2)
                                            <div class="col-md-12 radio_choose radio_block ">
                                                <div class="row">
                                                    <div class="form-check col-md-12">
                                                        <input class="form-check-input" required type="radio" name="transaction" value="block" id="block_ticket">
                                                        <label class="form-check-label" for="block_ticket">
                                                            BLOCK
                                                        </label>
                                                    </div>
                                                    <div class="col-md-9" style="margin-top: 15px">
                                                        Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                                        at least 2 days before departure, your block seat will be automatically cancelled.
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 15px">
                                                        <p>Your payment deadline:</p>
                                                        <p class="deadline-date">23:59 {{Carbon\Carbon::parse(session('flights_choose')[0]->departure_date)->setDay(Carbon\Carbon::parse(session('flights_choose')[0]->departure_date)->day -2)->format('d/m/Y')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($diff_date >=0 && $diff_date < 2)
                                            <div class="col-md-12 radio_choose radio_block not_allow ">
                                                <div class="row">
                                                    <div class="form-check col-md-12">
                                                        <input class="form-check-input"   type="radio" name="transaction" value="block" id="block_ticket">
                                                        <label class="form-check-label" for="block_ticket">
                                                            BLOCK
                                                        </label>
                                                    </div>
                                                    <div class="col-md-9" style="margin-top: 15px">
                                                        Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                                        at least 2 days before departure, your block seat will be automatically cancelled.
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 15px">
                                                        <p style="color: darkred; text-align: center">You are not allowed to block tickets</p>
                                                        <p class="deadline-date"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12 radio_choose_active radio_choose radio_buy">
                                            <div class="row">
                                                <div class="form-check col-md-12">
                                                    <input class="form-check-input" type="radio" required name="transaction" value="buy" id="buy_ticket" checked>
                                                    <label class="form-check-label" for="buy_ticket">
                                                        PURCHASE WITH <img src="front/images/Logo-VNPAYQR-update.png" width="80" alt="">
                                                    </label>
                                                </div>
                                                <div class="col-md-12">
                                                    <p style="margin-top: 15px">
                                                        Feel the comfortability with our online payment in co-operate with VNPay

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($old_order_status == 1)
                                    <div class="col-md-12 radio_choose radio_block not_allow ">
                                        <div class="row">
                                            <div class="form-check col-md-12">
                                                <input class="form-check-input"   type="radio" name="transaction" value="block" id="block_ticket">
                                                <label class="form-check-label" for="block_ticket">
                                                    BLOCK
                                                </label>
                                            </div>
                                            <div class="col-md-9" style="margin-top: 15px">
                                                Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                                at least 2 days before departure, your block seat will be automatically cancelled.
                                            </div>
                                            <div class="col-md-3" style="margin-top: 15px">
                                                <p style="color: darkred; text-align: center">You are not allowed to block tickets</p>
                                                <p class="deadline-date"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 radio_choose_active radio_choose radio_buy">
                                        <div class="row">
                                            <div class="form-check col-md-12">
                                                <input class="form-check-input" type="radio" required name="transaction" value="buy" id="buy_ticket" checked>
                                                <label class="form-check-label" for="buy_ticket">
                                                    PURCHASE WITH <img src="front/images/Logo-VNPAYQR-update.png" width="80" alt="">
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="margin-top: 15px">
                                                    Feel the comfortability with our online payment in co-operate with VNPay

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endif
                        </form>
                    </div>
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
                        @if($old_order_status == 1 && session('diff_amount')>0)
                            <tr>
                                <td><b>Old Subtotal</b></td>
                                <td colspan="2"><b>USD {{session('old_order')['total_price']}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Reschedule Fee</b></td>
                                <td colspan="2"><b>USD {{session('diff_amount')}}</b></td>
                            </tr>
                        @elseif($old_order_status == 1 && session('diff_amount')<=0)
                            <tr>
                                <td><b>Old Subtotal</b></td>
                                <td colspan="2"><b>USD {{session('old_order')['total_price']}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Reschedule Fee</b></td>
                                <td colspan="2"><b>USD 0</b></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="row back-continue" >
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <a href="./booking/show_seats"><button class="btn btn-secondary" type="button">Back</button></a>
                <button class="btn btn-primary" type="submit">Continue</button>
            </div>
        </div>
    </div>
    </form>
</div>


@endsection

