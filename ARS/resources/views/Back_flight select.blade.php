@extends('layout.normal')
@section('title','Flight')

@section('body')

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/HEL_Popup_Teaser_E22.jpg); height: 400px">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
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
            <form>
        <div class="row col-md-12">
            <div class="btn-group group1" role="group" aria-label="Basic example">
                <button type="button" class="date-button btn btn-secondary active">21/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">22/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">23/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">24/2 <br>(From VND111)</button>
            </div>
        </div>
        <!--            cac chuyen bay-->

        <div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" id="b">
                </div>

            <div class="col-md-11">
                <table>
                    <tr>
                        <td rowspan="2">HV111</td>
                        <td>Ha Noi &nbsp;&nbsp;&nbsp;<img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;Ho Chi Minh</td>
                        <td>Date:</td>
                        <td>12/12/2012</td>
                        <td>Departure:</td>
                        <td>17:50</td>
                        <td rowspan="2">VND 1000</td>
                    </tr>
                    <tr>
                        <td>seat(s) left</td>
                        <td>Duration: </td>
                        <td>2:30 hour(s)</td>
                        <td>Arrival:</td>
                        <td>18:20</td>
                    </tr>
                </table>
            </div>
        </div>

        <!--        IN-->
        <div class="row col-md-12">
            <h3>Inbound</h3>
        </div>
        <div class="row col-md-12">
            <div class="btn-group group2" role="group" aria-label="Basic example">
                <button type="button" class="date-button btn btn-secondary active">21/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">22/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">23/2 <br>(From VND111)</button>
                <button type="button" class="date-button btn btn-secondary">24/2 <br>(From VND111)</button>
            </div>
        </div>
        <!--            cac chuyen bay-->
        <div class="row col-md-12 flight-detail">
                <div class="col-md-1">
                    <input type="radio" id="a">
                </div>

            <div class="col-md-11">
                <table>
                    <tr>
                        <td rowspan="2">HV111</td>
                        <td>Ha Noi &nbsp;&nbsp;&nbsp;<img src="../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/429706-84%20-%20Copy.png" alt="">&nbsp;&nbsp;&nbsp;Ho Chi Minh</td>
                        <td>Date:</td>
                        <td>12/12/2012</td>
                        <td>Departure:</td>
                        <td>17:50</td>
                        <td rowspan="2">VND 1000</td>
                    </tr>
                    <tr>
                        <td>seat(s) left</td>
                        <td>Duration: </td>
                        <td>2:30 hour(s)</td>
                        <td>Arrival:</td>
                        <td>18:20</td>
                    </tr>
                </table>
            </div>
        </div>
                <div class="row back-continue">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <button class="btn btn-secondary" type="button">Back</button>
                        <button class="btn btn-primary" type="submit">Continue</button>
                    </div>

                </div>
                <br>
            </form>
        </div>
    </div>
@endsection
