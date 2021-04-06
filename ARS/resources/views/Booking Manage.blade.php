@extends('layout.normal')
@section('title','Booking')

@section('body')
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/5.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Booking Management</h1>
                        </div>
                        <form class="search-flight">
                            <div class="row mt-text animate-box" data-animate-effect="fadeInUp">
                                <label for="search-flight" class="sr-only">Code</label>
                                <input type="text" id="search-flight" class="col-md-8 form-control" placeholder="Enter booking code" required autofocus>
                                <button class="col-md-2 btn-primary btn-block" type="submit"><svg class="svg-icon" viewBox="0 0 20 20">
                                    <path fill="none" d="M18.109,17.776l-3.082-3.081c-0.059-0.059-0.135-0.077-0.211-0.087c1.373-1.38,2.221-3.28,2.221-5.379c0-4.212-3.414-7.626-7.625-7.626c-4.212,0-7.626,3.414-7.626,7.626s3.414,7.627,7.626,7.627c1.918,0,3.665-0.713,5.004-1.882c0.006,0.085,0.033,0.17,0.098,0.234l3.082,3.081c0.143,0.142,0.371,0.142,0.514,0C18.25,18.148,18.25,17.918,18.109,17.776zM9.412,16.13c-3.811,0-6.9-3.089-6.9-6.9c0-3.81,3.089-6.899,6.9-6.899c3.811,0,6.901,3.09,6.901,6.899C16.312,13.041,13.223,16.13,9.412,16.13z"></path>
                                </svg>
                                </button>
                            </div>
                        </form>

                        <!--                 TICKET-->

                        <div class="ticket-form mt-text animate-box" data-animate-effect="fadeInUp">
                            <div class="row" >
                                <div class="passenger-ticket col-md-4" style="padding:0;">
                                    <table>
                                        <tr>
                                            <th>Passenger</th>
                                            <th>Seat ID</th>
                                        </tr>
                                        <tr>
                                            <td>Nguyen Van A</td>
                                            <td>32A</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><a style="cursor: pointer" data-toggle="modal" data-target="#reschedule">RESCHEDULE</a></td>
                                        </tr>
                                        <tr>
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
                                                        <h5 class="modal-title">CANCEL BOOKING</h5>
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
                                <div class="col-md-8" style="padding:0;border-left: 0.5px dotted #3a3a3b ">
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
                                        <div class="col-md-1">
                                            <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                        </div>
                                        <div class="col-md-5 outbound">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>From</span>
                                                    <p>Ha Noi</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>To</span>
                                                    <p>Ha Noi</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>flight</span>
                                                    <p>///</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>date</span>
                                                    <p>///</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>departure time</span>
                                                    <p>///</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>Arrival time</span>
                                                    <p>///</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                inbound-->
                                        <div class="col-md-1">
                                            <img src="front/images/cach-phan-biet-may-doc-ma-vach-1d-va-may-quet-ma-vach-2d-to.jpg" alt="">
                                        </div>
                                        <div class="col-md-5 inbound">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>From</span>
                                                    <p>Ha Noi</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>To</span>
                                                    <p>Ha Noi</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>flight</span>
                                                    <p>///</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>date</span>
                                                    <p>///</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span>departure time</span>
                                                    <p>///</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <span>Arrival time</span>
                                                    <p>///</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
