@extends('layout.normal')
@section('title','Checkout')

@section('body')
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
    <form>
    <div class="col-md-12 mt-text animate-box" style="padding: 0" data-animate-effect="fadeInUp">
        <div class="row" style="margin: 20px 0 20px;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="post" >
                            <div class="row">
                                <div class="col-md-12 radio_choose radio_block">
                                    <div class="row">
                                        <div class="form-check col-md-12">
                                            <input class="form-check-input" type="radio" name="transaction" id="block_ticket">
                                            <label class="form-check-label" for="block_ticket">
                                                BLOCK
                                            </label>
                                        </div>
                                        <div class="col-md-9" style="margin-top: 15px">
                                            Your seat will be reserved until the purchase is made. According to our policy, unless you proceed purchase
                                            at least 2 weeks before departure, your block seat will be automatically cancelled.
                                        </div>
                                        <div class="col-md-3" style="margin-top: 15px">
                                            <p>Your payment deadline:</p>
                                            <p class="deadline-date"> 23:59 - 18/5/2021</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 radio_choose_active radio_choose radio_buy">
                                    <div class="row">
                                        <div class="form-check col-md-12">
                                            <input class="form-check-input" type="radio" name="transaction" id="buy_ticket" checked>
                                            <label class="form-check-label" for="buy_ticket">
                                                PURCHASE
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <p style="margin-top: 15px">
                                                <img src="front/images/Logo-VNPAYQR-update.png" width="150" alt="">
                                                Online payment with VNPAY
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 flight_detail">
                <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                    <table>
                        <tr>
                            <th colspan="3">13/5/2021 --- HV121</th>
                        </tr>
                        <tr>
                            <td>Ha Noi</td>
                            <td rowspan="2"><img src="front/images/429706-84%20-%20Copy.png" alt=""></td>
                            <td>Ho Chi Minh</td>
                        </tr>
                        <tr>
                            <td>18:50</td>
                            <td>19:50</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th colspan="3">13/5/2021 --- HV121</th>
                        </tr>
                        <tr>
                            <td>Ha Noi</td>
                            <td rowspan="2"><img src="front/images/429706-84%20-%20Copy.png" alt=""></td>
                            <td>Ho Chi Minh</td>
                        </tr>
                        <tr>
                            <td>18:50</td>
                            <td>19:50</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th colspan="2">Passenger</th>
                        </tr>
                        <tr>
                            <td>Mr.</td>
                            <td>Xuan Binh/Duong</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th colspan="2">Price (4 passengers)</th>
                        </tr>
                        <tr>
                            <td>Ticket Fare</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td>Airport Tax</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td>Admin Fee</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td>Airport Security</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td>System Admin</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td>Seat Fee</td>
                            <td>VND 1000</td>
                        </tr>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>VND 100000</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row back-continue" >
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <button class="btn btn-secondary" type="button">Back</button>
                <button class="btn btn-primary" type="submit">Continue</button>
            </div>
        </div>
    </div>
    </form>
</div>


@endsection

