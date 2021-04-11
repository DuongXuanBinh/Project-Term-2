@extends('layout.master')
@section('title','Home')

@section('body')
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style=" height: 600px ; background-image: url(front/images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row" style="margin-top: 70px">
				<div class="col-md-12 col-md-offset-0 text-left ">


					<div class="row">
						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1 class="text-center">Planning Trip To Anywhere in The World?</h1>
						</div>

						<div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
							<div class="form-wrap">
								<div class="tab">
									<div class="tab-content">
										<div class="tab-content-inner active " data-content="signup">
											<h3 >Book Your Flight</h3>
											<form action="./booking/create" method="get" class="row">
												<div class="col-md-4 row">
													<div class="col-md-12 booking-form">
														<label class="sr-only" for="place_from">From</label>
														<div class="input-group mb-2 mr-sm-2 d-flex">
															<div class="input-group-prepend">
																<div class="input-group-text">From</div>
															</div>
                                                            <input type="text" class="form-control" name="place_from" id="place_from" required placeholder="From">
                                                            <div id="place_from_list"><br></div>
														</div>
                                                        {{--                                                        {{csrf_field()}}--}}
													</div>
													<div class="col-md-12 booking-form">
														<label class="sr-only" for="place_to">To</label>
														<div class=" input-group mb-2 mr-sm-2 d-flex">
															<div class="input-group-prepend">
																<div class="px-4 input-group-text">To</div>
															</div>
                                                            <input type="text" class="form-control" name="place_to" id="place_to" required placeholder="To">
                                                            <div id="place_to_list"><br></div>
                                                        </div>
                                                        {{--                                                        {{csrf_field()}}--}}
													</div>

												</div>
												<div class="col-md-2 ">
													<div class="overlay_datepicker"></div>
                                                    <input type="hidden" name="date_outbound" id="datepicker_outbound" required>
													<div class="btn-date btn booking-form" id="from-outbound-date">
														Outbound
														<div class="outbound_day"></div>

														<div class="outbound_month"></div>
													</div>
												</div>
												<div class="col-md-2 row ">
													<button  type="button" class="close_return_date_btn " aria-label="Close">
														<span aria-hidden="true">x</span>
													</button>
													<div class="overlay_datepicker"></div>
													<input type="hidden" name="date_return" id="datepicker_return">
													<div class="btn-date btn booking-form " id="add-return-date">
														Add a return <br>
														<span class="icon-plus"></span>
													</div>
													<div class="btn-date btn booking-form display_return_date">
														Return Flight
														<div class="return_day"></div>
														<div class="return_month"></div>
													</div>

												</div>
												<div class="col-md-3 row">
													<div class="col-md-12">
														<div class="dropdown" id="passenger_dropdown">
                                                            <div class="booking-form btn_passenger btn_sum_passenger btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																1 Passenger
															</div>
															<div class="dropdown-menu" >
                                                                <div class="passenger_div">Adult <input type="number" name="adult" required value="1" min="1" max="9" class="passenger_input"> </div>
                                                                <div class="passenger_div">Children <input type="number" name="children" required value="0" min="0" max="9" class="passenger_input"></div>
                                                                <div class="passenger_div">Senior citizens <input type="number" name="senior" required value="0" min="0" max="9" class="passenger_input"></div>
																<div class="dropdown-divider"></div>
																<div class="confirm_div">Confirm</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="btn_passenger btn booking-form" id="travel_dropdown" >
															Travel Class
														</div>
														<div class="class_radio_div mb-3">
                                                            <label class="container_radio">Economy
                                                                <input type="radio" name="travel_class" value="1" required>
																<span class="checkmark"></span>
															</label>
                                                            <label class="container_radio">Business
                                                                <input type="radio" name="travel_class" value="2" required>
                                                                <span class="checkmark"></span>
                                                            </label>
															<div class="confirm_div">Confirm</div>
														</div>
													</div>
													</div>
												<div class="col-md-2">
														<input type="submit" class="btn btn-primary btn-block w-100 h-100" value="Search">
												</div>
											</form>
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

	<div class="gtco-section news_section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12  text-center gtco-heading">
						<h2>Discover Promotions</h2>
						<p>Helvetic Airline is proud to be a leading 4-star global airline. Our sincere thanks to all valued customers and partners for your support! Helvetic Airline</p>
					</div>
				<div class="owl-carousel ">
						<div class="carousel_item">
							<img src="front/images/navigation-student.jpg" height="140px" width="200px" alt="">
							<h2>Student privileges</h2>
							<p >With our student privileges, travel smart and enjoy exclusive perks as part of your academic journey.
								Pack everything you will miss from home with 40kg of checked baggage.</p>
							<p><a class="btn btn-secondary" href="/promotion">View details &raquo;</a></p>
						</div>

						<div class="carousel_item">
							<img src="front/images/helveticairways-12-1000x667.jpg" height="140px" width="200px" alt="">
							<h2>Other KrisFlyer</h2>
							<p  >From now till 31 March 2021, apply for an American Express Singapore Airlines Credit Card and receive an exclusive 10,000
								KrisFlyer miles* upon the first spend on your card. </p>
							<p class=""><a class="btn btn-secondary" href="/promotion">View details &raquo;</a></p>
						</div>

						<div class=" carousel_item">
							<img src="front/images/masthead-car.jpg" height="140px" width="200px" alt="">
							<h2>Car rentals</h2>
							<p >Get where you need to go in greater convenience, and at a fantastic price. Rentalcars.com works with all major international
								car rental suppliers at over 50,000 rental locations worldwide.</p>
							<p class=""><a class="btn btn-secondary" href="/promotion">View details &raquo;</a></p>
						</div>

						<div class="carousel_item">
							<img src="front/images/masthead-hotel.jpg" height="140px" width="200px" alt="">
							<h2>Hotels</h2>
							<p  > Agoda connects you to great accommodations all over the world at equally great prices. With Agoda, you can easily make an
								informed choice before you hit “book”.</p>
							<p><a class="btn btn-secondary" href="/promotion">View details &raquo;</a></p>
						</div>

						<div class=" carousel_item">
							<img src="front/images/promo-hotels-cars.jpg" height="140px" width="200px" alt="">
							<h2>Travel add-ons</h2>
							<p  >Tradewinds is the tour-operating and travel services arm of Singapore Airlines and SilkAir, tours.
								Committed to the same quality and service standards of the airline.</p>
							<p><a class="btn btn-secondary" href="/promotion">View details &raquo;</a></p>
						</div>
					</div>
			</div>
		</div>
	</div>

	<div class="gtco-cover gtco-cover-sm" style="background-image: url(front/images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container text-center">
				<div class="display-t">
					<div class="display-tc">
						<h1>We have high quality services that you will surely love!</h1>
					</div>
				</div>
			</div>
		</div>

	<div class="gtco-section">

		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Most Popular Destination</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="/destination" class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="front/images/1542686134580-9cf063d92ec3f0645fd3ef224ed6dd6e.jpeg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Ha Noi Capital</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="/destination" class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="front/images/19A03054.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Ho Chi Minh City</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="/destination" class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="front/images/dien-bien-va-7-diem-check-in-nhat-dinh-phai-ghe-tham-1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Dien Bien</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-features">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
						<h2><a href="/policy">Our Policy</a></h2>
						<!--						<p  >An airline policy is a series of terms and conditions created by an airline. These policies outline an airline's approach to key concepts like baggage, flight changes, seating, and more.</p>-->
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<!--						<span class="icon">-->
							<!--							<i>1</i>-->
							<!--						</span>-->
							<h3><a href="/policy">Cancellation - Refund</a> </h3>
							<p class="text-justify" > You may cancel your Helvetic Airline ticket online for a refund if you’ve purchased a ticket directly from Singapore Airlines, on a refundable fare. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<!--						<span class="icon">-->
							<!--							<i>2</i>-->
							<!--						</span>-->
							<h3><a href="/policy">Service on board</a></h3>
							<p class="text-justify" >The Helvetic Airways crew is waiting for you with customary Swiss hospitality. A high-quality snack or meal (depending on the time of day & flight) is offered to passengers on all routes.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<!--						<span class="icon">-->
							<!--							<i>3</i>-->
							<!--						</span>-->
							<h3><a href="/policy">Lost baggage</a></h3>
							<p class="text-justify" >Should one or several pieces of individual items or the entire content of your baggage be missing, please notify the Helvetic Airways handling agents of this immediately. </p>
						</div>
					</div>


				</div>
			</div>
		</div>

	<div id="gtco-counter" class="gtco-section py-3">
		<div class="gtco-container">


			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box mb-2">
					<h2>Our Success</h2>
					<p>Starting on May 13,1996 with five planes and fewer than 30 employees, our journey continues today as the airline flying to the most countries in the world – celebrating our 25th year.
						Our 25-year success story is marked by the strength we have gained through challenges and difficult times.</p>
				</div>
			</div>

			<div class="row">

				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Destinations</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="3995" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Flights</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="30402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Travelers</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Frequent Customers</span>

					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
