<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCELLATION CONFIRMATION | Helvetic Airline</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/style.css">
    <script src="front/js/jquery-ui.min.js"></script>
</head>
<body style="background-color: #393c3b24;color: black">

<div class="container mail-page">
    <!--    header cua mail-->
    <div class="row mail-header">
        <div class="col-4">
            <img src="https://lh3.googleusercontent.com/fife/ABSRlIqb_wJ88OJRvj8tssoFE7mQkxVonPWaEotVvlagmRQNa17EKNVHr4eiTtRHX2dU7gI96BP7_ECz35aIZGMPpMsAWIJkqvXfVfoevVBw8ck7DLfvyO0Evil0YGd9YVVi5OIcyCVPxYLw80bg8gZmKTGx_yERZZTZk3nETv9XBsIA1lQ_SRVjiB6uhvkqapXJBoiRt-qfXTVFdCA7jidEMw0PqOH4b-QfyYSrEP1WkIJ9CE2NeLGHaoxE6zh6PGiKB1NFb9ALbB0qI67lHK9ce0YTVKUT21vr8a682_m1Mwc_8NSIY-g5M4taZcRwBGngZPKkbFQd0TgMALXTDM3XuimPq0s_bilISWMybzI7MC4MBFyotRSCS16R65hf9JjVF5cVCl_oMLy8OIZYaNAKsgD10y5Ivt1AumPoye_Avtf4s1D8qpJ2hOi49nIB6LIVtIpkAQGiMdWeUNhjBHykPrhXbyPLlOqzL_RF8xoF4uvC50ACHEDSHkkc0C_morJiOSvGRBl-ayvchO58wADRnJdUvAOYtFGVpBJ-qE5_vo8ZBUDlupgENL0B38AiXfYiAJG4g-0F3Mb7pl_I7URjrC9M1DrwnO902HxbyBQmdqDnhhel5vzRrJheSe_2ib-NCnO6nSA4puGiF8vC0DUALXx2UhKI-lD_7YcmZ0swoI7OtZEB0aWrmf5jjb56zxUYOT2UwqamMWs-qjT2naGeUTvn59gimTGf_f4=s688-w688-h149-rw" width="200" height="auto"/>
        </div>
        <div class="col-8">
            <h3>CANCELLATION CONFIRMATION</h3>
        </div>
    </div>
    <div class="row col-12">
        <p class="first-thanks">Thank you for choosing Helvetic Airline to make your travel reservation. You can require your reservation information below.
            To see the latest information about your reservation, visit <a href="helveticairline.epizy.com">Helvetic Airline website</a></p>
    </div>
    <div class="row col-12">
        <p class="col-12">Dear Customer, <br>
            Your Heveltic Airline flight reservation has been cancelled.</p>
    </div>
    <div class="row col-12">
        <p class="itinerary">CANCELLED DETAILS</p>
    </div>

    <div class="row ticket-details">
        <div class="col-8">
            <table>
                    @for($i=0;$i<count($passengers);$i++)
                        @if($i>0)
                            <tr>
                                <td>@if($passengers[$i]->sex == 'Male')Mr. &nbsp;&nbsp;@else Mrs/Ms. &nbsp;&nbsp;@endif{{strtoupper($passengers[$i]->lastname)}}/{{strtoupper($passengers[$i]->firstname)}}</td>
                            </tr>
                        @else
                            <tr>
                            <td class="menu" rowspan="{{count($passengers)}}">Passenger Name:</td>
                                <td>@if($passengers[$i]->sex == 'Male')Mr. &nbsp;&nbsp;@else Mrs/Ms. &nbsp;&nbsp;@endif{{strtoupper($passengers[$i]->lastname)}}/{{strtoupper($passengers[$i]->firstname)}}</td>
                            </tr>
                        @endif
                    @endfor
                <tr>
                    <td class="menu">E-mail:</td>
                    <td>{{$account->email}}</td>
                </tr>
                <tr>
                    <td class="menu">Phone number:</td>
                    <td>{{$account->phone}}</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <!--            qr code den website-->
            <img src="https://lh3.googleusercontent.com/QTyhEBiJJu1O8fHSCtNMNWoOALoe_36vM2pNN-51G__WgtpsbBeVaSBFKXaZlh5LvXQGeATZ32WSZ-PxbXuID4olOM6tPy87xi-evoNPqiO94fL9hhWk3iv49oXHhQIuONH596_MMElB0IqmvC_ii_b5kl05psX8gzP3CDJSMjWCkSjB1NHAicVsW_Yo7kfuNZmiX2cIy9s-6MIiiyO3jAUUy_2PzvZ-7dqPuFkOjnhri8HvbbztQjdIhHxpw6DuzKJg-PGZ6xotEHpD-Sy1t9NEl3dmeRWq40rgJ9uf1CEdQvMWilnSoaYS5ncO5A4nd9gb3pqH9e4nh1P5uwLHLVZQ0N159cvDrGYi50mozjmCy_JZJJCyHpWyrFZgwghLPKThEiQV51t_6muaqSI_xwTH2quGAHtL_pVd1qZ8VhsAUTwD4CzmHbbz5rnupwIQsX-t6JF9fX86B1A049bVDLrUJeXwhoPsARZUUTbh-Z2sGlS_lwsEZsfuGlR26b5g_yPMIdt898HyhcOjUR4dwer7kKhK79yLSXiA8LW7UjUNiY2w9LWN6nDM23EUt7_TXi6tYkOZ_SaWArETKScnn6Ytq7Q-O4jyEVfqJd7GWYeQOswyizRh71IhyRMI0SCqvFc3Yp72f563p7B9LZaHv-8nLrfDGJt6MIGgOGbGpcKdHkfIWryyJGUtXQUC2FePD9X_Qw-HHCwKNCDzIpHPCxTJ=s200-no?authuser=0" height="60" width="60"/>
            <p>Reservation code: {{$code}}</p>
        </div>
    </div>
        @for($i = 0;$i<count($flights);$i++)
            <p><img src="https://lh3.googleusercontent.com/sdKPStBDtWHr6LC2EOQZxamRxoOXM39dSYiNZTjpekbup5iyMcDEqDkd0lFT1l2rMypXA-XqvFywE6JiOfvKws1MfsU2acNXS6Br3aT23YEAWxztV178aM4HZAeK50voOAgiucRVzwE2fFX2fJ3Cl75WT81xxwMymmlUBYtrAk0ysCCT1KSduN68-tE1RSLJkHiSS-3cdDR_mU_r5oEhXF5XwEk1FTk_MAhIiY7AjANs4ZQnZ7_307JH79hLAF7IlQJsAhUx472HimGKtS9SUEr-qPKJwT3Ri9zKNcrSLchxin7larVzpIJzuixVm7AcrsUiRhIrDPpCa3VHTAGtQAh96c8VwihMtn3z0r7kfViiPn66KcwtaIznFUn8K__Y0HO40kJ9uq4COdO5CqJdc4vg1aevD-pilL8QOt8490mxwFYIfLiac12rfLncpYnKwXfHTAT_3MImlz9Brg5O2HXyyXnWVRUrl8wGBdcLaSio1thDtgxfsDx_6E0KXxYyron3vaWxgsrDobbAT0-lmpjb7Enb7MIF25byytvcSGoqB887HgnT5D6QAbr3Oden6Y2eo4sdkcNkcCC7s9VaWq92PPnMLm_3MCakNcXrKjMRRGgYISMtoCSMQ4eP0raL11HwoxzrMKaqCQMYTvEooDUhpELRpT8aQ0gyrz-s51SPFKQexRnJ5NSstKDdyBmvBjPlXQ_peQizaICcadKRP02b=s84-no?authuser=0" height="30" width="30"/> Departure: <span class="depart-date">{{date('F j, Y',strtotime($flights[$i]->departure_date))}}</span></p>
            <div class="row departure-details">
                <div class="col-4" style="-webkit-clip-path: polygon(15% 0%,100% 0%,100% 100%, 0% 100%,0% 15%); !important;">
                    <p>Helvetic Airline</p>
                    <p>{{$flights[$i]->id}} - {{$plane_type[$i]}}</p>
                    <p>Duration: {{date('H',strtotime($duration[$i]))}} hr(s) {{date('i',strtotime($duration[$i]))}} min(s)</p>
                </div>
                <div class="col-8">
                    <table>
                        <tr>
                            <td>
                                <img src="https://lh3.googleusercontent.com/M6el8SGgFEKhBrET4dJDj0sZPs06JEEbH-wYb7tXKgAjGRbQ3CvdPSL0KVdbUQJGZl97JB9ninaMUSiZD7gHI7RpGkOuKISca3n2-qd6ImgD3d0l0-sGpYEqBscPd8oN4ur8PSdOPlG9XDhsIip6Q0-Qh4fVQ6EA5cY8pd-ljgDfOdEPtgCuWsT3CEqUgpKngStlBPj0yoQ4-ovkw5-tc04VBVqQ59TAvNdEGFn96IlwBvyIsEdj7WJLal6zQRXWovDIriTWcL5_onqC6soTSPa2GE1bKxY4z4Rfle9789X2BssEGbBS2SMIVUNmrs7ZjeDvJRlolN3bnQfJ7cCzPBl6ehNDGaabn8rP4QSqkbKjzMIBwpaZXrZJCBQljKkOtRjlHdS7AN1LOwRGhAb4k2cFpMzG4zO3zUkDaMdJSkGSO5NNQrIwO9z8CUYJSsKic6RObpPB2TbnX_xBdrs_ljLOP_mwha8NDz-7zxf1iStL1u5CaUg8dCy-4VAymTmlsa6fvxRWhenBe6BRLw_WNpi9p9GZx9_hKhxr_BObbe_bG_zPyVbwAwBQV60npqBeMRbzaPo8ffPLBDIBadgE3MD2Tfwx_RIoSLyL4cP_k2_gIByiwUCV2SWwpQQZ3eLk__BYJGG8voi5plsx-xCpYclgKTfhdgpF7ZC4V5pfFI3K6t8V8WnFQeYE6_3zHg0Usy6LctxPnKEscsdLfexaqsBh=s128-no?authuser=0" height="50" width="50"/>
                                <span>{{$ori_airports[$i]->id}}</span>
                                <p>{{$ori_airports[$i]->name}}</p>
                            </td>
                            <td>
                                <img src="https://lh3.googleusercontent.com/C1FBvbRHFXD-92E61uOSJ2XkUhjsiO0bcLqXRI-nPQDn3TwphhGZ80zqdnTmS_bIufDAqzJKvPJv7jiFFfhc3CainEjIjAIsUneb_GhldGUD4kSwsEhc9oy1Kfnw6LNjtOMQAkxQ2v6ATHHIxwGHaQ64rARKSKvNE9Y5p2VWFNlCEhMtbsFhsypB-cJoEeMIsW1auJxXyIiNnm1dahh_pRkABFoeHOB7IfAic7lJtXTbzgGjHEqW-XNUJuCQRVXuOJ9VWyo2D7PglxbWvK3EBtbh76fQixOVmB3b7k0Chay4UQTb6J6OcdjVjdDYBsQ_Tk0Qm2Xpm1fFtvznt05Kk9IQMZD4mCKoiHZMgglh1sZml7Dm0HK1snhc7doGlmhHdFpLFNUiwtzOUEkpR-1MRFT2EIxV6u7xVl59V9MajZh6tN0ZUiGJjqqfOflL-n2S2om9w823GxXKtO5-M6pUygD9FjzJyQxX7-mpuRa_6K0kOxHBkvwPNCVYw45U2uQxhUMJ15w8XeI6D9GYXN45RoSNmMfPEb8w9A8SWcsAdC-hvisXSG_gzd-7sSzHGim-WL0hzseSczgbX12Gvje2en2N_jb-zyde5WVKRSzn2Q2AryEIVWMFUmf6liEDIEh9n5FKJxnMdheqbQj7R1QKm-rG8I5g_R0or4dVQNHv1lLJx6EAn8QjM8LsYa9lKn5NasXOU8R8N0_kT9CdhS-DT1Wr=s128-no?authuser=0" height="50" width="50"/>
                                <span>{{$arr_airports[$i]->id}}</span>
                                <p>{{$arr_airports[$i]->name}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Departuring at: <span>{{date('H:i',strtotime($flights[$i]->departure_date))}}</span></p>
                            </td>
                            <td>
                                <p>Arriving at: <span>{{date('H:i',strtotime($flights[$i]->arrival_date))}}</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Terminal: 2</p>
                            </td>
                            <td>
                                <p>Terminal: 1</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endfor

    <p>Payment Details</p>
    <div class="row payment-details">
        <table>
            <tr>
                <td colspan="2">Payment Type</td>
                <td>VN Pay</td>
            </tr>
            <tr>
                <td colspan="2">Status</td>
                <td><span>Paid</span></td>
            </tr>
            <tr>
                <td colspan="2">Ticket Fare</td>
                <td>${{$price}}</td>
            </tr>
            <tr>
                <td rowspan="4">Tax</td>
                <td>Airport Tax Domestic (1 pax)</td>
                <td>$10 x {{count($passengers)}}</td>
            </tr>
            <tr>
                <td>Admin Fee Domestic (1 pax)</td>
                <td>$5 x {{count($passengers)}}</td>
            </tr>
            <tr>
                <td>Airport Security (1 pax)</td>
                <td>$5 x {{count($passengers)}}</td>
            </tr>
            <tr>
                <td>System Admin (1 pax)</td>
                <td>$5 x {{count($passengers)}}</td>
            </tr>
            <tr>
                <td colspan="2">Total</td>
                <td>${{$price + count($passengers) * count($flights) * 25}}</td>
            </tr>
        </table>
    </div>
    <div class="row col-12">
        <p>According to our policy, you will be refunded <b>50%</b> of total fare which is <b><u>VND 1000</u></b></p>
    </div>
    <div class="row col-12">
        <p>The refund will be proceeded within <b>2 weeks</b> from today.</p>
    </div>
    <div class="row col-12">
        <p class="last-thanks col-12">Thank you! We wish to fly with you next time!</p>
    </div>
    <p class="hotline"> Hotline: <a href="tel:19009999">1900-9999</a> (24/7 service).</p>
</div>
</body>
</html>
