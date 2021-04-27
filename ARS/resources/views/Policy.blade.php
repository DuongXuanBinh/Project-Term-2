@extends('layout.normal')
@section('title','Policy')

@section('body')
    <?php
    session()->forget('page');
    ?>
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="height:625px;background-image: url(front/images/SPECIAL_CHARTER_11.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <<div class="row">
            <div class="col-md-12 col-md-offset-0 text-center" style="padding-top: 200px">
                <div class="row row-mt-15em">

                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="font-size: 80px">Policy</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="gtco-section">
        <div class="gtco-container policy-page">
            <div class="row">
                <div class="col-md-4">
                    <img src="front/images/lost-luggage-waiting-1200x627.jpg" alt="">
                    <span>Damaged Baggage</span>
                    <span>></span>
                </div>
                <div class="col-md-8">
                    <h3>Damaged Baggage</h3>
                    <p>Helvetic Airways accepts liability for damages caused during a flight operated by Helvetic Airways and for which there is a valid contract of carriage. <a href=""><i>read more</i></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="front/images/Maintenance-Babcock-H145-EMS-2017.jpg" alt="">
                    <span>Safety </span>
                    <span>></span>
                </div>
                <div class="col-md-8">
                    <h3>Safety</h3>
                    <p>All travellers to Switzerland must be able to present a negative COVID-19 test result. Please refer to the regulations of the FOPH under Coronavirus: Entering Switzerland. <a href=""><i>read more</i></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="front/images/3RALUHAKTRGPPC3LADWRDJMXHI.jpg" alt="">
                    <span>Cancellation - Refund</span>
                    <span>></span>
                </div>
                <div class="col-md-8">
                    <h3>Cancellation - Refund</h3>
                    <p>You may cancel your Helvetic Airline ticket online for a refund if you’ve purchased a ticket directly from Singapore Airlines, on a refundable fare. <a href=""><i>read more</i></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="front/images/SPECIAL_CHARTER_4.jpg" alt="">
                    <span>Service on board</span>
                    <span>></span>
                </div>
                <div class="col-md-8">
                    <h3>Service on board</h3>
                    <p>The Helvetic Airways crew is waiting for you with customary Swiss hospitality.

                        A high-quality snack or meal (depending on the time of day & flight) is offered to passengers on all routes.
                        <a href=""><i>read more</i></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="front/images/lost-luggage-article-image.jpg" alt="">
                    <span>Lost baggage</span>
                    <span>></span>
                </div>
                <div class="col-md-8">
                    <h3>Lost baggage</h3>
                    <p>Should one or several pieces of individual items or the entire content of your baggage be missing, please notify the Helvetic Airways handling agents of this immediately. <a
                                href=""><i>read more</i></a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
