@extends('layout.normal')
@section('title','Passenger')

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

                        <button type="button" name="selectflight" class="first-button btn btn-secondary">Select flight</button>
                        <button type="button" name="passenger" class="second-button btn btn-secondary ">Passenger</button>
                        <button type="button" name="pickseat" class="second-button btn btn-secondary disable-button">Pick a seat</button>
                        <button type="button" name="checkout" class="second-button btn btn-secondary disable-button">Check out</button>

                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <h2 style="text-align: center;letter-spacing: 2px;margin-top: 20px">PASSENGER</h2>
            </div>
        </div>
    </div>

    <div class="gtco-container passenges_list">
        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp" style="padding: 0">
            <form>
            <div class="row">
                    <div class="col-md-8 passengers_form"  >

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#passenger1">Passenger 1</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="passenger1">

                                    <form class="form" action="##" method="post" id="info_passenger1">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name1"><h4>First name</h4></label>
                                                <input type="text" class="form-control" name="first_name" id="first_name1" placeholder="First name" title="enter your first name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name1"><h4>Last name</h4></label>
                                                <input type="text" class="form-control" name="last_name" id="last_name1" placeholder="Last name" title="enter your last name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Phone</h4></label>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" title="enter your phone number if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Email</h4></label>
                                                <input type="email" class="form-control" name="email" id="your-email" placeholder="You@email.com" title="enter your email.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="dob1"><h4>Date of birth</h4></label>
                                                <input type="date" data-toggle="datepicker" class="form-control" name="dob" id="dob1" placeholder="date of birth" title="enter date of birth">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="sexs1"><h4>Sex</h4></label>
                                                <input id="sex1" list="sexs1" class="form-control" placeholder="Sex" required>
                                                <datalist id="sexs1">
                                                    <option value="Male">
                                                    <option value="Female">
                                                </datalist>
                                            </div>
                                        </div>
                                        <br><br>
                                    </form>
                                </div><!--/tab-pane-->
                            </div><!--/tab-pane-->
                    </div>
                    <div class="col-md-4 flight_detail">
                            <table>
                                <tr>
                                    <th colspan="3">13/5/2021 --- HV121</th>
                                </tr>
                                <tr>
                                    <td>Ha Noi</td>
                                    <td rowspan="2"><img src="public/front/images/429706-84%20-%20Copy.png" alt=""></td>
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
                                <td rowspan="2"><img src="public/front/images/429706-84%20-%20Copy.png" alt=""></td>
                                <td>Ho Chi Minh</td>
                            </tr>
                            <tr>
                                <td>18:50</td>
                                <td>19:50</td>
                            </tr>
                        </table>
                            <table>
                                <tr>
                                    <th>Fare Details</th>
                                    <th>HV121</th>
                                    <th>HV131</th>
                                </tr>
                                <tr>
                                    <td>Ticket Fare</td>
                                    <td>VND 1000</td>
                                    <td>VND 1000</td>
                                </tr>
                                <tr>
                                    <td>Airport Tax Domestic</td>
                                    <td>VND 1000</td>
                                    <td>VND 1000</td>
                                </tr>
                                <tr>
                                    <td>Admin Fee</td>
                                    <td>VND 1000</td>
                                    <td>VND 1000</td>
                                </tr>
                                <tr>
                                    <td>Airport Security</td>
                                    <td>VND 1000</td>
                                    <td>VND 1000</td>
                                </tr>
                                <tr>
                                    <td>System Admin</td>
                                    <td>VND 1000</td>
                                    <td>VND 1000</td>
                                </tr>
                                <tr>
                                    <td>Passenger Number</td>
                                    <td colspan="2">2</td>
                                </tr>
                                <tr>
                                    <td><b>Subtotal</b></td>
                                    <td colspan="2"><b>VND 100000</b></td>
                                </tr>
                            </table>
                    </div>
            </div>
            <div class="row  back-continue">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <button class="btn btn-secondary" type="button">Back</button>
                    <button class="btn btn-primary" type="submit">Continue</button>
                </div>
            </div>
        </form>
        </div>
    </div>



@endsection

