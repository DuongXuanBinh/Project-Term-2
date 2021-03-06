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
            <form action="./booking/create_passengers" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-9 passengers_form"  >

                        <ul class="nav nav-tabs">
                            @for($i=0; $i<session('total_passengers');$i++)
                                @if($i == 0)
                                    <li class="active"><a data-toggle="tab" href="#passenger{{$i+1}}">Passenger {{$i+1}}</a></li>
                                @elseif($i!=0)
                                    <li ><a data-toggle="tab" href="#passenger{{$i+1}}">Passenger {{$i+1}}</a></li>
                                @endif
                            @endfor
                        </ul>

                        <div class="tab-content">
                            @for($i=0; $i<session('total_passengers');$i++)
                                @if($i == 0)
                                    <div class="tab-pane active" id="passenger{{$i+1}}">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name{{$i+1}}"><h4>First name</h4></label>
                                                <input type="text" @if(session('passengers')) value="{{session('passengers')[$i]['firstname']}}" @endif required class="form-control" name="first_name[]" id="first_name{{$i+1}}" placeholder="First name" title="enter your first name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name{{$i+1}}"><h4>Last name</h4></label>
                                                <input type="text" class="form-control" @if(session('passengers')) value="{{session('passengers')[$i]['lastname']}}" @endif required name="last_name[]" id="last_name{{$i+1}}" placeholder="Last name" title="enter your last name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Phone</h4></label>
                                                <input type="text" class="form-control"  name="phone" readonly value="{{session('check')->phone}}" id="phone" placeholder="Enter phone" title="enter your phone number if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Email</h4></label>
                                                <input type="email" class="form-control"  readonly value="{{session('email')}}" name="email" id="your-email" placeholder="You@email.com" title="enter your email.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="dob{{$i+1}}"><h4>Date of birth</h4></label>
                                                <input type="date" @if(session('passengers')) value="{{session('passengers')[$i]['dob']}}" @endif data-toggle="datepicker" required class="form-control" name="dob[]" id="dob{{$i+1}}" placeholder="date of birth" title="enter date of birth">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="sexs{{$i+1}}"><h4>Gender</h4></label>
                                                <input id="sex{{$i+1}}" list="sexs{{$i+1}}" @if(session('passengers')) value="{{session('passengers')[$i]['sex']}}" @endif name="sex[]" class="form-control" placeholder="Gender" required>
                                                <datalist id="sexs{{$i+1}}">
                                                    <option value="Male">
                                                    <option value="Female">
                                                </datalist>
                                            </div>
                                        </div>
                                        <br><br>

                                    </div><!--/tab-pane-->
                                @elseif($i!=0)
                                    <div style="padding-bottom: 230px" class="tab-pane" id="passenger{{$i+1}}">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name{{$i+1}}"><h4>First name</h4></label>
                                                <input type="text" class="form-control" @if(session('passengers')) value="{{session('passengers')[$i]['firstname']}}" @endif required name="first_name[]" id="first_name{{$i+1}}" placeholder="First name" title="enter your first name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name{{$i+1}}"><h4>Last name</h4></label>
                                                <input type="text" class="form-control" required name="last_name[]" @if(session('passengers')) value="{{session('passengers')[$i]['lastname']}}" @endif id="last_name{{$i+1}}" placeholder="Last name" title="enter your last name if any.">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="dob{{$i+1}}"><h4>Date of birth</h4></label>
                                                <input type="date" @if(session('passengers')) value="{{session('passengers')[$i]['dob']}}" @endif data-toggle="datepicker" required class="form-control" name="dob[]" id="dob{{$i+1}}" placeholder="date of birth" title="enter date of birth">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="sexs{{$i+1}}"><h4>Gender</h4></label>
                                                <input id="sex{{$i+1}}" list="sexs{{$i+1}}" @if(session('passengers')) value="{{session('passengers')[$i]['sex']}}" @endif name="sex[]" class="form-control" placeholder="Gender" required>
                                                <datalist id="sexs{{$i+1}}">
                                                    <option value="Male">
                                                    <option value="Female">
                                                </datalist>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div><!--/tab-pane-->
                                @endif
                            @endfor
                        </div>

                    </div>
                    <div class="col-md-3 flight_detail">
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

                    </div>
                </div>
                <div class="row  back-continue">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <a href="./booking/show_flights"><button class="btn btn-secondary" type="button">Back</button></a>
                        <button class="btn btn-primary" type="submit">Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

