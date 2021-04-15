@extends('layout.normal')
@section('title','Booking')

@section('body')
    <?php
    $arr_airports = session('arr_airport');
    $ori_airports = session('ori_airport');
    $passengers = session('passengers');
    $flights = session('flights');
    $seats = session('seat');
    ?>
        @if(!session('flights'))
            <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/5.jpg)">
                <div class="overlay"></div>
                <div class="gtco-container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 text-center">
                            <div class="row row-mt-15em">
                                <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                                    <h1>Booking Management</h1>
                                </div>
                                <form class="search-flight" action="/booking-manage/search">
                                    <div class="row mt-text animate-box" data-animate-effect="fadeInUp">
                                        <label for="search-flight" class="sr-only">Code</label>
                                        <input value="{{session('code')}}" name="confirm-code" type="text" id="search-flight" class="col-md-8 form-control" placeholder="Enter booking code" required autofocus>
                                        <button class="col-md-2 btn-primary btn-block" type="submit"><svg class="svg-icon" viewBox="0 0 20 20">
                                                <path fill="none" d="M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                @if(session('hide'))
                                    <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                                        <div class="row" >
                                            <div class="passenger-ticket col-md-3" style="padding:0;">
                                                <table>
                                                    <tr>
                                                        <th>Passenger</th>
                                                        <th>Seat ID</th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-9" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
                                                <div class="row ticket-logo">
                                                    <div class="col-md-12">
                                                        <img src="front/images/logo%20chu%20trang.png" alt="">
                                                        <span>ECONOMY Class</span>
                                                        <img src="front/images/logo%20chu%20trang.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="row bound">
                                                    <div class="col-md-12">
                                                        <p style="margin-bottom: 0">OUTBOUND</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <!--                                outbound-->
                                            <p style="margin: 20px auto">BOOKING CODE HAS NOT FOUND</p>
                                        </div>
                                    </div>
                                @endif
        @elseif(session('flights'))

                @if(count(session('flights')) <= 2)
                    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/5.jpg)">
                        <div class="overlay"></div>
                        <div class="gtco-container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0 text-center">
                                    <div class="row row-mt-15em">
                                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                                            <h1>Booking Management</h1>
                                        </div>
                                        <form class="search-flight" action="/booking-manage/search">
                                            <div class="row mt-text animate-box" data-animate-effect="fadeInUp">
                                                <label for="search-flight" class="sr-only">Code</label>
                                                <input value="{{old('confirm-code')}}" name="confirm-code" type="text" id="search-flight" class="col-md-8 form-control" placeholder="Enter booking code" required autofocus>
                                                <button class="col-md-2 btn-primary btn-block" type="submit"><svg class="svg-icon" viewBox="0 0 20 20">
                                                        <path fill="none" d="M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                    @if(session('way')==1 && count(session('flights'))==1)
                        <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                                                <div class="row" >
                                                    <div class="passenger-ticket col-md-3" style="padding:0;">
                                                        <table>

                                                            <tr>
                                                                <th>Passenger</th>
                                                                <th>Seat ID</th>
                                                            </tr>
                                                            @for($i=0;$i<count($passengers);$i++)
                                                            <tr>
                                                                <td>{{$passengers[$i]->firstname}} {{$passengers[$i]->lastname}}</td>
                                                                @for($j=0;$j<count($flights);$j++)
                                                                    <td>{{$seats[$i][$j]->seat_location}}</td>
                                                                @endfor
                                                            </tr>
                                                            @endfor
                                                            <tr style="margin-top: 10px;height: 25px">
                                                                <td colspan="2"><a style="cursor: pointer" data-toggle="modal" data-target="#reschedule">RESCHEDULE</a></td>
                                                            </tr>
                                                            <tr style="height: 25px">
                                                                <td colspan="2"><a style="cursor: pointer" data-toggle="modal" data-target="#cancel">CANCEL</a></td>
                                                            </tr>

                                                            <div class="modal fade password-change" id="reschedule" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">RESCHEDULE</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <label for="new-date">New daparture date:</label>
                                                                                <input type="text" id="new-date" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Find</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="modal fade password-change" id="cancel" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                                                                </svg> CANCEL BOOKING</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <p>Once you cancelled booking, you can't reverse the progress</p>
                                                                                <p>You will be refunded according to our policy. The amount depends on each case</p>
                                                                                <p>Do you still want to cancel?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </table>
                                                    </div>
                                                    <div class="col-md-9" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
                                                        <div class="row ticket-logo">
                                                            <div class="col-md-12">
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                                <span>ECONOMY Class</span>
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row bound">
                                                            <div class="col-md-12">
                                                                <p>OUTBOUND</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!--                                outbound-->
                                                            <div class="col-md-1">
                                                                <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-11 outbound">
                                                                <div class="row">
                                                                    @for($i=0;$i<count($flights);$i++)
                                                                    <div class="col-md-6">
                                                                        <span>From</span>
                                                                        <p>{{$ori_airports[$i]->name}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>To</span>
                                                                        <p>{{$arr_airports[$i]->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <span>flight</span>
                                                                        <p>{{$flights[$i]->id}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>date</span>
                                                                        <p>{{date('d/m/Y',strtotime($flights[$i]->departure_date))}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <span>departure time</span>
                                                                        <p>{{date('H:i',strtotime($flights[$i]->departure_date))}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>Arrival time</span>
                                                                        <p>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</p>
                                                                    </div>
                                                                </div>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    @elseif(session('way')==1 && count(session('flights'))==2)
                        <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                                                <div class="row" >
                                                    <div class="passenger-ticket col-md-3" style="padding:0;">
                                                        <table>
                                                            <tr>
                                                                <th>Passenger</th>
                                                                <th colspan="2">Seat ID</th>
                                                            </tr>
                                                            @for($i=0;$i<count($passengers);$i++)
                                                                <tr>
                                                                    <td>{{$passengers[$i]->firstname}} {{$passengers[$i]->lastname}}</td>
                                                                    @for($j=0;$j<count($flights);$j++)
                                                                        <td>{{$seats[$i][$j]->seat_location}}</td>
                                                                    @endfor
                                                                </tr>
                                                            @endfor

                                                            <tr style="margin-top: 10px;height: 25px">
                                                                <td colspan="3"><a style="cursor: pointer" data-toggle="modal" data-target="#reschedule">RESCHEDULE</a></td>
                                                            </tr>
                                                            <tr style="height: 25px">
                                                                <td colspan="3"><a style="cursor: pointer" data-toggle="modal" data-target="#cancel">CANCEL</a></td>
                                                            </tr>

                                                            <div class="modal fade password-change" id="reschedule" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">RESCHEDULE</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <label for="new-date">New daparture date:</label>
                                                                                <input type="text" id="new-date" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Find</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="modal fade password-change" id="cancel" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                                                                </svg> CANCEL BOOKING</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <p>Once you cancelled booking, you can't reverse the progress</p>
                                                                                <p>You will be refunded according to our policy. The amount depends on each case</p>
                                                                                <p>Do you still want to cancel?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </table>
                                                    </div>
                                                    <div class="col-md-9" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
                                                        <div class="row ticket-logo">
                                                            <div class="col-md-12">
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                                <span>ECONOMY Class</span>
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row bound">
                                                            <div class="col-md-12">
                                                                OUTBOUND
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            @for($i = 0;$i<count($flights);$i++)
                                                            <div class="col-md-1">
                                                                <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-5 outbound">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <span>From</span>
                                                                        <p>{{$ori_airports[$i]->name}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>To</span>
                                                                        <p>{{$arr_airports[$i]->name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <span>flight</span>
                                                                        <p>{{$flights[$i]->id}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>date</span>
                                                                        <p>{{date('d/m/Y',strtotime($flights[$i]->departure_date))}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <span>departure time</span>
                                                                        <p>{{date('H:i',strtotime($flights[$i]->departure_date))}}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>Arrival time</span>
                                                                        <p>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    @elseif(session('way')==2 && count(session('flights'))==2)
                        <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                                                <div class="row" >
                                                    <div class="passenger-ticket col-md-3" style="padding:0;">
                                                        <table>
                                                            <tr>
                                                                <th>Passenger</th>
                                                                <th colspan="2">Seat ID</th>
                                                            </tr>
                                                            @for($i=0;$i<count($passengers);$i++)
                                                                <tr>
                                                                    <td>{{$passengers[$i]->firstname}} {{$passengers[$i]->lastname}}</td>
                                                                    @for($j=0;$j<count($flights);$j++)
                                                                        <td>{{$seats[$i][$j]->seat_location}}</td>
                                                                    @endfor
                                                                </tr>
                                                            @endfor
                                                            <tr  style="margin-top: 10px;height: 25px">
                                                                <td colspan="3"><a style="cursor: pointer" data-toggle="modal" data-target="#reschedule">RESCHEDULE</a></td>
                                                            </tr>
                                                            <tr style="height: 25px">
                                                                <td colspan="3"><a style="cursor: pointer" data-toggle="modal" data-target="#cancel">CANCEL</a></td>
                                                            </tr>

                                                            <div class="modal fade password-change" id="reschedule" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">RESCHEDULE</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <label for="new-date">New daparture date:</label>
                                                                                <input type="text" id="new-date" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Find</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="modal fade password-change" id="cancel" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                                                                </svg> CANCEL BOOKING</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <p>Once you cancelled booking, you can't reverse the progress</p>
                                                                                <p>You will be refunded according to our policy. The amount depends on each case</p>
                                                                                <p>Do you still want to cancel?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </table>
                                                    </div>
                                                    <div class="col-md-9" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
                                                        <div class="row ticket-logo">
                                                            <div class="col-md-12">
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                                <span>ECONOMY Class</span>
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row bound">
                                                            <div class="col-md-6">
                                                                <p>OUTBOUND</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>INBOUND</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!--                                outbound-->
                                                            @for($i = 0;$i<count($flights);$i++)
                                                                <div class="col-md-1">
                                                                    <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                                                </div>
                                                                <div class="col-md-5 outbound">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>From</span>
                                                                            <p>{{$ori_airports[$i]->name}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>To</span>
                                                                            <p>{{$arr_airports[$i]->name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>flight</span>
                                                                            <p>{{$flights[$i]->id}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>date</span>
                                                                            <p>{{date('d/m/Y',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>departure time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>Arrival time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    @endif
                @elseif(count(session('flights')) > 2)
                    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/5.jpg);height: 850px">
                        <div class="overlay"></div>
                            <div class="gtco-container">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0 text-center">
                                        <div class="row row-mt-15em">
                                            <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                                                <h1>Booking Management</h1>
                                            </div>
                                            <form class="search-flight" action="/booking-manage/search">
                                                <div class="row mt-text animate-box" data-animate-effect="fadeInUp">
                                                    <label for="search-flight" class="sr-only">Code</label>
                                                    <input value="{{old('confirm-code')}}" name="confirm-code" type="text" id="search-flight" class="col-md-8 form-control" placeholder="Enter booking code" required autofocus>
                                                    <button class="col-md-2 btn-primary btn-block" type="submit"><svg class="svg-icon" viewBox="0 0 20 20">
                                                         <path fill="none" d="M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z"></path>
                                                         </svg>
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                                                <div class="row" >
                                                    <div class="passenger-ticket col-md-3" style="padding:0;">
                                                        <table>
                                                            <tr>
                                                                <th>Passenger</th>
                                                                <th>Seat ID</th>
                                                            </tr>
                                                            @for($i=0;$i<count($passengers);$i++)
                                                                <tr>
                                                                    <td>{{$passengers[$i]->firstname}} {{$passengers[$i]->lastname}}</td>
                                                                    @for($j=0;$j<count($flights);$j++)
                                                                        <td>{{$seats[$i][$j]->seat_location}}</td>
                                                                    @endfor
                                                                </tr>
                                                            @endfor
                                                            <tr  style="margin-top: 10px;height: 25px">
                                                                <td colspan="2"><a style="cursor: pointer" data-toggle="modal" data-target="#reschedule">RESCHEDULE</a></td>
                                                            </tr>
                                                            <tr style="height: 25px">
                                                                <td colspan="2"><a style="cursor: pointer" data-toggle="modal" data-target="#cancel">CANCEL</a></td>
                                                            </tr>

                                                            <div class="modal fade password-change" id="reschedule" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">RESCHEDULE</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <label for="new-date">New daparture date:</label>
                                                                                <input type="text" id="new-date" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Find</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="modal fade password-change" id="cancel" tabindex="-1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                                                                                </svg> CANCEL BOOKING</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <form action="">
                                                                            <div class="modal-body">
                                                                                <p>Once you cancelled booking, you can't reverse the progress</p>
                                                                                <p>You will be refunded according to our policy. The amount depends on each case</p>
                                                                                <p>Do you still want to cancel?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Cancel</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </table>
                                                    </div>
                                                    <div class="col-md-9" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
                                                        <div class="row ticket-logo">
                                                            <div class="col-md-12">
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                                <span>ECONOMY Class</span>
                                                                <img src="front/images/logo%20chu%20trang.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row bound">
                                                            <div class="col-md-12">
                                                                OUTBOUND
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!--                                outbound-->
                                                            @for($i = 0;$i<count($flights)-2;$i++)
                                                                <div class="col-md-1">
                                                                    <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                                                </div>
                                                                <div class="col-md-5 outbound">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>From</span>
                                                                            <p>{{$ori_airports[$i]->name}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>To</span>
                                                                            <p>{{$arr_airports[$i]->name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>flight</span>
                                                                            <p>{{$flights[$i]->id}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>date</span>
                                                                            <p>{{date('d/m/Y',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>departure time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>Arrival time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                        <div class="row bound">
                                                            <div class="col-md-12">
                                                                INBOUND
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!--                                outbound-->
                                                            @for($i = 2;$i<count($flights);$i++)
                                                                <div class="col-md-1">
                                                                    <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                                                </div>
                                                                <div class="col-md-5 outbound">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>From</span>
                                                                            <p>{{$ori_airports[$i]->name}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>To</span>
                                                                            <p>{{$arr_airports[$i]->name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>flight</span>
                                                                            <p>{{$flights[$i]->id}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>date</span>
                                                                            <p>{{date('d/m/Y',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <span>departure time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->departure_date))}}</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <span>Arrival time</span>
                                                                            <p>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                @endif
        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
