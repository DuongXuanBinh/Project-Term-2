<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
<head>
    <base href="{{asset('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Center | Helvetic</title>

    <!-- Facebook and Twitter integration -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="front/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="front/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="front/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="front/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="front/css/magnific-popup.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="front/css/bootstrap-datepicker.min.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="front/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="front/css/style.css">

    <!-- Modernizr JS -->
    <script src="front/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="front/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="page">


    <!-- <div class="page-inner"> -->
    <nav class="gtco-nav" role="navigation">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row ">
                <div class="col-sm-4 col-xs-12 ">
                    <div id="gtco-logo"><a><img class="img-responsive" style="width: 80%" src="front/images/logo_1.png" alt=""></a></div>
                </div>
                <div style="padding-top: 1.5rem" class="pt-4 col-xs-8 text-right menu-1 ">
                    <ul>
                        @if(session('email')&&session('password'))
                            <li class="has-dropdown">
                                <a style="cursor: pointer">Hi, {{session('check')->lastname}}</a>
                                <ul class="dropdown">
                                    <li><a href="./profile/sign-out">Sign out</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="./sign-in">Account</a></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="height:625px;background-image: url(front/images/NATSControl-centre0080a1-Copy.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <<div class="row">
            <div class="col-md-12 col-md-offset-0 text-center" style="padding-top: 200px">
                <div class="row row-mt-15em">

                    <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                        <h1 style="font-size: 80px">CONTROL CENTER</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 admin-menu">
                <div class="row admin-profile">
                    <div class="col-md-4" style="padding: 0">
                        <img style="width: 60px;" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle " alt="avatar">
                    </div>
                    <div class="col-md-8" style="padding: 0">
                        <p style="text-align: center;font-size: 1.2em;margin-bottom: 0">Xuan Binh</p>
                        <i><p style="text-align: center;font-size: 0.9em">Administrator</p></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-fill" viewBox="0 -5 16 21">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>&nbsp;&nbsp;&nbsp;&nbsp;Account</a></li>
                            <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-telegram" viewBox="0 -5 16 21">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                                    </svg>&nbsp;&nbsp;&nbsp;&nbsp;Flight</a></li>
                            <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-upc-scan" viewBox="0 -5 16 21">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                    </svg>&nbsp;&nbsp;&nbsp;&nbsp;Order</a></li>
                            <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-geo-fill" viewBox="0 -5 16 21">
                                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
                                    </svg>&nbsp;&nbsp;&nbsp;&nbsp;Plane</a></li>
                        </ul>
                        <p class="sign-out"><a href="/profile/sign-out">Sign out</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 admin-table">
{{--                FOR ACCOUNT--}}
{{--                acount table--}}
                <div class="row col-md-12">
                    <table>
                        <tr class="table-menu">
                            <th colspan="12">ACCOUNT</th>
                            <th colspan="4"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>  Add account</button></th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>D.O.B</th>
                            <th>Sex</th>
                            <th>Credit_number</th>
                            <th>Phone</th>
                            <th>Sky_miles</th>
                            <th>Role</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Deleted_at</th>
                            <th></th>
                        </tr>
                        <form action="">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg></button>
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
{{--                customer--}}
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr class="table-menu">
                                <th colspan="8">CUSTOMER</th>
                                <th colspan="2"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>  Add customer</button></th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Sex</th>
                                <th>D.O.B</th>
                                <th>Account_id</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Deleted_at</th>
                                <th></th>
                            </tr>
                            <tr>
                                <form>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg></button>
                                        <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg></button>
                                    </td>
                                </form>
                            </tr>
                        </table>
                    </div>
{{--                customer type--}}
                <div class="col-md-6">
                    <table>
                        <tr class="table-menu">
                            <th colspan="7">CUSTOMER TYPE</th>
                            <th colspan="2"><button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>  Add customer</button></th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Min_age</th>
                            <th>Max_Age</th>
                            <th>Fare_diff</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Deleted_at</th>
                            <th></th>
                        </tr>
                        <tr>
                            <form action="">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></button>
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg></button>
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
                </div>
                {{--                    FOR FLIGHT--}}
                {{--                    --------Flight table-------}}
{{--                <div class="col-md-6">--}}
{{--                    <table>--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Route_id</th>--}}
{{--                            <th>Departure_date</th>--}}
{{--                            <th>Arrival_date</th>--}}
{{--                            <th>Status_id</th>--}}
{{--                            <th>Plane_id</th>--}}
{{--                            <th>Created_at</th>--}}
{{--                            <th>Updated_at</th>--}}
{{--                            <th>Deleted_at</th>--}}
{{--                            <th></th>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
                {{--------route table----------------}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="row">--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Origin_airportid</th>--}}
{{--                                <th>Arrival_airportid</th>--}}
{{--                                <th>Distance</th>--}}
{{--                                <th>Duration</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    flight status table--}}
{{--                    <div class="row">--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                FOR ORDER--}}
{{--                order table--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <table>--}}
{{--                        <tr>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Account_id</th>--}}
{{--                            <th>Order_status</th>--}}
{{--                            <th>Total_price</th>--}}
{{--                            <th>Total_skymile</th>--}}
{{--                            <th>Flight_route</th>--}}
{{--                            <th>Created_at</th>--}}
{{--                            <th>Updated_at</th>--}}
{{--                            <th>Deleted_at</th>--}}
{{--                            <th></th>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                ticket_detail--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Flight_id</th>--}}
{{--                                <th>Seat_location</th>--}}
{{--                                <th>Order_id</th>--}}
{{--                                <th>Passenger_id</th>--}}
{{--                                <th>Price</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    order status--}}
{{--                    <div class="col-md-12">--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                FOR PLANE--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        plane table--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Plane_type</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        plane_type--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Business_seats</th>--}}
{{--                                <th>Economy_seats</th>--}}
{{--                                <th>Total_seats</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        seat--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Seat_location</th>--}}
{{--                                <th>Class_id</th>--}}
{{--                                <th>Plane_type</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                class--}}
{{--                        <table>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Hand_baggage</th>--}}
{{--                                <th>Checked_baggage</th>--}}
{{--                                <th>Created_at</th>--}}
{{--                                <th>Updated_at</th>--}}
{{--                                <th>Deleted_at</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>


    <footer id="gtco-footer" role="contentinfo" style="height: 50px;
    background-color: #000000f7;">
        <div class="gtco-container">
        </div>
    </footer>

</div>
</body>
</html>


<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="/front/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/front/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/front/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/front/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="/front/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="/front/js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="/front/js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="/front/js/jquery.magnific-popup.min.js"></script>
<script src="/front/js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<script src="/front/js/bootstrap-datepicker.min.js"></script>


<!-- Main -->
<script src="/front/js/main.js"></script>

</body>
</html>
