@extends('layout.normal')
@section('title','Status')

@section('body')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/5.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Flight Status</h1>
                        </div>
                        <form class="search-flight" action="/flight-status/search">
                            <div class="row mt-text animate-box" data-animate-effect="fadeInUp">

                                <input value="{{old('flight_id')}}" name="flight_id" type="text" class="col-md-6 form-control" placeholder="Enter flight number" required autofocus>
                                <input value="{{old('date')}}" name="date" type="text" class="col-md-2 form-control" id="date-flight" placeholder="Departure Date" required>
                                <button class="col-md-2 btn-primary btn-block" type="submit"><svg class="svg-icon" viewBox="0 0 20 20">
                                    <path fill="none" d="M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z"></path>
                                </svg>
                                </button>
                            </div>
                        </form>

                        @if(session('flight')&&session('ori_airport')&&session('status')&&session('arr_airport'))
                            <?php
                            $flight = session('flight');
                            $ori_airport = session('ori_airport');
                            $arr_airport = session('arr_airport');
                            $status = session('status');
                            ?>
                        <div class="result-form mt-text animate-box" data-animate-effect="fadeInUp">
                            <div class="row col-md-12">
                            <table>
                                <tr>
                                    <th>Flight Number</th>
                                    <th>Origin</th>
                                    <th>Desination</th>
                                    <th>Departure Date</th>
                                    <th>Departure time</th>
                                    <th>Arivale Date</th>
                                    <th>Arrival time</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>{{$flight->id}}</td>
                                    <td>{{$ori_airport->name}}</td>
                                    <td>{{$arr_airport->name}}</td>
                                    <td>{{date('d/m/Y',strtotime($flight->departure_date))}}</td>
                                    <td>{{date('H:i',strtotime($flight->departure_date))}}</td>
                                    <td>{{date('d/m/Y',strtotime($flight->arrival_date))}}</td>
                                    <td>{{date('H:i',strtotime($flight->arrival_date))}}</td>
                                    <td>{{$status->name}}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
