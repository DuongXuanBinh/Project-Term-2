@extends('layout.master')
@section('title','Profile')

@section('body')

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(front/images/img_bg_3.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center" style="padding-top: 220px">
                <div class="row row-mt-5em">
                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="gtco-section" style="padding-top: 10px">
        <div class="gtco-container profile_form ">
            <div class="row pt-5">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img style="height: 200px; width: 200px" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <label class="btn" for="avatar">Change Avatar</label>
                        <input type="file" id="avatar" class="text-center center-block file-upload">
                    </div><br>

                    <ul class="list-group">
<!--                        <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>-->
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Sky miles</strong></span>{{$user->sky_miles}}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Flights</strong></span> 3 </li>
                    </ul>
                    <p style="text-align: center;cursor:pointer;"  data-toggle="modal" data-target="#myModal"><i>Change password</i></p>
                    <div class="modal fade password-change" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="/profile/change-password" method="post">
                                <div class="modal-body">
                                    <label for="old-password">Current password:</label>
                                    <input type="password" id="old-password" required>
                                    <label for="new-password">New password:</label>
                                    <input type="password" id="new-password" required>
                                    <label for="cnew-password">Confirm new password:</label>
                                    <input type="password" id="cnew-password" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--/col-3-->
                <div class="col-sm-9">
                            <form class="form" action="/profile/update" method="post" id="registrationForm">
                                @csrf
                                <div class="col-xs-6">
                                        <label for="first_name"><h4>First name</h4></label>
                                        <input type="text" class="form-control" name="first_name" value="{{$user->firstname}}" id="first_name" required placeholder="first name" title="enter your first name if any.">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="last_name"><h4>Last name</h4></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->lastname}}" required placeholder="last name" title="enter your last name if any.">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="phone"><h4>Phone</h4></label>
                                        <input type="tel" class="form-control" name="phone" value="{{$user->phone}}" id="phone" required placeholder="enter phone" title="enter your phone number if any.">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="credit_card"><h4>Credit card number</h4></label>
                                        <input type="text" class="form-control" name="credit_card" id="credit_card" value="{{$user->credit_number}}" required placeholder="enter mobile number" title="enter your credit card number">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="youremail"><h4>Email</h4></label>
                                        <input type="email" class="form-control" name="email" id="youremail" value="{{$user->email}}" required placeholder="you@email.com" title="enter your email.">
                                    </div>


                                    <div class="col-xs-6">
                                        <label for="address"><h4>Address</h4></label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Your address" value="{{$user->address}}" title="enter your address" required>
                                    </div>

                                    <div class="col-xs-6">
                                        <label for="sexs"><h4>Sex</h4></label>
                                        <input id="sex" name="sex" list="sexs" class="form-control" placeholder="Sex" value="{{$user->sex}}" required>
                                        <datalist id="sexs">
                                            <option value="Male">
                                            <option value="Female">
                                        </datalist>
                                    </div>

                                    <div class="col-xs-6">
                                    <label for="age"><h4>Date of Birth</h4></label>
                                    <input type="date" id="age" name="age" class="form-control" value="{{$user->dob}}" placeholder="Date Of Birth" required>
                                    </div>

                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-lg btn-primary edit" type="button">Edit</button>
                                        <button class="btn btn-lg save btn-primary pull-right" type="submit" >Save</button>
                                        <button class="btn btn-lg cancel btn-secondary pull-right" type="reset">Cancel</button>
                                    </div>
                            </form>

                        </div><!--/tab-pane-->
                    </div><!--/tab-pane-->
                </div>
            </div><!--/col-9-->
        </div><!--/row-->

@endsection

