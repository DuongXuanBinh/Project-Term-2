<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block Confirmation | Helvetic Airline</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
{{--    <link rel="stylesheet" href="front/css/style.css">--}}
    <script src="front/js/jquery-ui.min.js"></script>
    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("../../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/fonts/icomoon/icomoon.eot?srf3rx");
            src: url("../../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/fonts/icomoon/icomoon.eot?srf3rx#iefix") format("embedded-opentype"), url("../../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/fonts/icomoon/icomoon.ttf?srf3rx") format("truetype"), url("../../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/fonts/icomoon/icomoon.woff?srf3rx") format("woff"), url("../../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/fonts/icomoon/icomoon.svg?srf3rx#icomoon") format("svg");
            font-weight: normal;
            font-style: normal;
        }
        /* =======================================================
        *
        * 	Template Style
        *
        * ======================================================= */
        body {
            font-family: "Lato", Arial, sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.7;
            color: #777;
            background: #fff;
        }

        #page {
            position: relative;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .offcanvas #page {
            overflow: hidden;
            position: absolute;
        }
        .offcanvas #page:after {
            -webkit-transition: 2s;
            -o-transition: 2s;
            transition: 2s;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 101;
            background: rgba(0, 0, 0, 0.7);
            content: "";
        }

        a {
            color: #09C6AB;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        a:hover, a:active, a:focus {
            color: #09C6AB;
            outline: none;
            text-decoration: none;
        }

        p {
            margin-bottom: 20px;
        }

        h1, h2, h3, h4, h5, h6, figure {
            color: #000;
            font-family: "Lato", Arial, sans-serif;
            font-weight: 400;
            margin: 0 0 20px 0;
        }

        ::-webkit-selection {
            color: #fff;
            background: #09C6AB;
        }

        ::-moz-selection {
            color: #fff;
            background: #09C6AB;
        }

        ::selection {
            color: #fff;
            background: #09C6AB;
        }

        .gtco-container {
            max-width: 1100px;
            position: relative;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .gtco-nav {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            width: 100%;
            z-index: 15;
        }
        @media screen and (max-width: 768px) {
            .gtco-nav {
                padding: 20px 0;
            }
        }
        .gtco-nav #gtco-logo {
            font-size: 20px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
            font-weight: bold;
        }
        .gtco-nav #gtco-logo em {
            color: #09C6AB;
        }
        .gtco-nav a {
            padding: 5px 10px;
            color: #fff;
        }
        @media screen and (max-width: 768px) {
            .gtco-nav .menu-1, .gtco-nav .menu-2 {
                display: none;
            }
        }
        .gtco-nav ul {
            padding: 0;
            margin: 2px 0 0 0;
        }
        .gtco-nav ul li {
            padding: 0;
            margin: 0;
            list-style: none;
            display: inline;
        }
        .gtco-nav ul li a {
            font-size: 16px;
            padding: 30px 10px;
            color: rgba(255, 255, 255, 0.7);
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .gtco-nav ul li a:hover, .gtco-nav ul li a:focus, .gtco-nav ul li a:active {
            color: white;
        }
        .gtco-nav ul li.has-dropdown {
            position: relative;
        }
        .gtco-nav ul li.has-dropdown .dropdown {
            width: 130px;
            -webkit-box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.15);
            z-index: 1002;
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 40px;
            left: 0;
            text-align: left;
            background: #fff;
            padding: 20px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
            -webkit-transition: 0s;
            -o-transition: 0s;
            transition: 0s;
        }
        .gtco-nav ul li.has-dropdown .dropdown:before {
            bottom: 100%;
            left: 40px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 8px;
            margin-left: -8px;
        }
        .gtco-nav ul li.has-dropdown .dropdown li {
            display: block;
            margin-bottom: 7px;
        }
        .gtco-nav ul li.has-dropdown .dropdown li:last-child {
            margin-bottom: 0;
        }
        .gtco-nav ul li.has-dropdown .dropdown li a {
            padding: 2px 0;
            display: block;
            color: #999999;
            line-height: 1.2;
            text-transform: none;
            font-size: 15px;
        }
        .gtco-nav ul li.has-dropdown .dropdown li a:hover {
            color: #09C6AB;
        }
        .gtco-nav ul li.has-dropdown .dropdown li.active > a {
            color: #000 !important;
        }
        .gtco-nav ul li.has-dropdown:hover a, .gtco-nav ul li.has-dropdown:focus a {
            color: #fff;
        }
        .gtco-nav ul li.btn-cta a {
            color: #09C6AB;
        }
        .gtco-nav ul li.btn-cta a span {
            border: 2px solid rgba(255, 255, 255, 0.5);
            padding: 4px 20px;
            color: #fff;
            display: -moz-inline-stack;
            display: inline-block;
            zoom: 1;
            *display: inline;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            -ms-border-radius: 7px;
            border-radius: 7px;
        }
        .gtco-nav ul li.btn-cta a:hover span {
            background: #fff;
            color: #09C6AB;
        }
        .gtco-nav ul li.active > a {
            color: #fff !important;
        }

        #gtco-header {
            background: #4d4d4d;
        }
        @media screen and (max-width: 992px) {
            #gtco-header.gtco-cover {
                height: inherit !important;
                padding: 3em 0 !important;
            }
        }
        @media screen and (max-width: 480px) {
            #gtco-header .text-left {
                text-align: center !important;
            }
        }
        @media screen and (max-width: 480px) {
            #gtco-header .btn {
                display: block;
                width: 100%;
            }
        }
        #gtco-header .mt-text {
            margin-top: 3em;
            margin-bottom: 2em;
        }
        @media screen and (max-width: 768px) {
            #gtco-header .mt-text {
                margin-top: 0;
            }
        }
        #gtco-header .intro-text-small {
            font-size: 14px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            letter-spacing: .15em;
            display: block;
            margin-bottom: 10px;
        }
        #gtco-header h1, #gtco-header h2 {
            margin: 0;
            padding: 0;
            color: white;
        }
        #gtco-header h1 {
            margin-bottom: 0px;
            font-size: 59px;
            line-height: 1.5;
            font-weight: 300;
        }
        @media screen and (max-width: 768px) {
            #gtco-header h1 {
                font-size: 34px;
                line-height: 1.2;
                margin-bottom: 10px;
            }
        }
        #gtco-header h2 {
            font-weight: 300;
            font-size: 22px;
            line-height: 1.5;
            margin-bottom: 30px;
        }
        #gtco-header .form-wrap {
            border-top: 10px solid #09C6AB;
            position: relative;
            width: 100%;
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.15);
        }
        #gtco-header .form-wrap .tab-menu {
            padding: 0 !important;
            margin: 0 0 -10px 0 !important;
            width: 100%;
            float: left;
            z-index: 12;
            position: relative;
        }
        #gtco-header .form-wrap .tab-menu li {
            padding: 0;
            margin: 0;
            list-style: none;
            display: inline;
            float: left;
            width: 50%;
            text-align: center;
        }
        #gtco-header .form-wrap .tab-menu li a {
            padding: 10px 20px 20px 20px;
            float: left;
            width: 100%;
            display: block;
            background: rgba(255, 255, 255, 0.5);
            color: #1a1a1a;
        }
        #gtco-header .form-wrap .tab-menu li a:hover {
            color: #1a1a1a;
        }
        #gtco-header .form-wrap .tab-menu li.active a {
            display: block;
            padding: 10px 20px 20px 20px;
            background: #fff;
            color: #09C6AB;
        }
        #gtco-header .form-wrap .tab-menu li.gtco-first a {
            border-top-left-radius: 7px;
        }
        #gtco-header .form-wrap .tab-menu li.gtco-second a {
            border-top-right-radius: 7px;
        }
        #gtco-header .form-wrap .tab-content {
            z-index: 10;
            position: relative;
            clear: both;
            background: #fff;
            padding: 30px;
        }
        #gtco-header .form-wrap .tab-content .tab-content-inner {
            display: none;
        }
        #gtco-header .form-wrap .tab-content .tab-content-inner.active {
            display: block;
        }

        #gtco-header,
        #gtco-counter,
        .gtco-bg {
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            position: relative;
        }

        .gtco-bg {
            background-position: center center;
            width: 100%;
            float: left;
            position: relative;
        }

        .gtco-video {
            height: 450px;
            overflow: hidden;
            margin-bottom: 30px;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            -ms-border-radius: 7px;
            border-radius: 7px;
        }
        .gtco-video.gtco-video-sm {
            height: 250px;
        }
        .gtco-video a {
            z-index: 1001;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -45px;
            margin-left: -45px;
            width: 90px;
            height: 90px;
            display: table;
            text-align: center;
            background: #fff;
            -webkit-box-shadow: 0px 14px 30px -15px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 14px 30px -15px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 14px 30px -15px rgba(0, 0, 0, 0.75);
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        .gtco-video a i {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            font-size: 40px;
        }
        .gtco-video .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .gtco-video:hover .overlay {
            background: rgba(0, 0, 0, 0.7);
        }
        .gtco-video:hover a {
            position: relative;
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .gtco-cover {
            height: 900px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
            float: left;
            width: 100%;
        }
        .gtco-cover a {
            color: #09C6AB;
        }
        .gtco-cover a:hover {
            color: white;
        }
        .gtco-cover .overlay{
            z-index: 1;
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .gtco-cover > .gtco-container {
            position: relative;
            z-index: 10;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover {
                height: 600px;
            }
        }
        .gtco-cover .display-t,
        .gtco-cover .display-tc {
            height: 900px;
            display: table;
            width: 100%;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover .display-t,
            .gtco-cover .display-tc {
                height: 600px;
            }
        }
        .gtco-cover.gtco-cover-sm {
            height: 600px;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover.gtco-cover-sm {
                height: 400px;
            }
        }
        .gtco-cover.gtco-cover-sm .display-t,
        .gtco-cover.gtco-cover-sm .display-tc {
            height: 600px;
            display: table;
            width: 100%;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover.gtco-cover-sm .display-t,
            .gtco-cover.gtco-cover-sm .display-tc {
                height: 400px;
            }
        }
        .gtco-cover.gtco-cover-xs {
            height: 500px;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover.gtco-cover-xs {
                height: inherit !important;
                padding: 3em 0;
            }
        }
        .gtco-cover.gtco-cover-xs .display-t,
        .gtco-cover.gtco-cover-xs .display-tc {
            height: 500px;
            display: table;
            width: 100%;
        }
        @media screen and (max-width: 768px) {
            .gtco-cover.gtco-cover-xs .display-t,
            .gtco-cover.gtco-cover-xs .display-tc {
                padding: 3em 0;
                height: inherit !important;
            }
        }

        .gtco-staff {
            text-align: center;
            margin-bottom: 7em;
            float: left;
            width: 100%;
        }
        @media screen and (max-width: 768px) {
            .gtco-staff {
                margin-bottom: 3em;
            }
        }
        .gtco-staff img {
            width: 100px;
            margin-bottom: 20px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        .gtco-staff h3 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .gtco-staff p {
            margin-bottom: 30px;
        }
        .gtco-staff .role {
            color: #bfbfbf;
            margin-bottom: 30px;
            font-weight: normal;
            display: block;
        }

        .gtco-social-icons {
            margin: 0;
            padding: 0;
        }
        .gtco-social-icons li {
            margin: 0;
            padding: 0;
            list-style: none;
            display: -moz-inline-stack;
            display: inline-block;
            zoom: 1;
            *display: inline;
        }
        .gtco-social-icons li a {
            display: -moz-inline-stack;
            display: inline-block;
            zoom: 1;
            *display: inline;
            color: #09C6AB;
            padding-left: 10px;
            padding-right: 10px;
        }
        .gtco-social-icons li a i {
            font-size: 20px;
        }

        .gtco-contact-info {
            margin-bottom: 30px;
            float: left;
            width: 100%;
            position: relative;
        }
        .gtco-contact-info ul {
            padding: 0;
            margin: 0;
        }
        .gtco-contact-info ul li {
            padding: 0 0 0 50px;
            margin: 0 0 30px 0;
            list-style: none;
            position: relative;
        }
        .gtco-contact-info ul li:before {
            color: #cccccc;
            position: absolute;
            left: 0;
            top: .05em;
            font-family: 'icomoon';
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            /* Better Font Rendering =========== */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .gtco-contact-info ul li.address:before {
            font-size: 30px;
            content: "\e9d1";
        }
        .gtco-contact-info ul li.phone:before {
            font-size: 23px;
            content: "\e9f4";
        }
        .gtco-contact-info ul li.email:before {
            font-size: 23px;
            content: "\e9da";
        }
        .gtco-contact-info ul li.url:before {
            font-size: 23px;
            content: "\e9af";
        }

        #registrationForm label {
            font-weight: normal !important;
        }

        #gtco-header .display-tc,
        #gtco-counter .display-tc,
        .gtco-cover .display-tc {
            display: table-cell !important;
            vertical-align: middle;
        }
        #gtco-header .display-tc .intro-text-small,
        #gtco-counter .display-tc .intro-text-small,
        .gtco-cover .display-tc .intro-text-small {
            font-size: 14px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            letter-spacing: .15em;
            display: block;
            margin-bottom: 10px;
        }
        #gtco-header .display-tc h1, #gtco-header .display-tc h2,
        #gtco-counter .display-tc h1,
        #gtco-counter .display-tc h2,
        .gtco-cover .display-tc h1,
        .gtco-cover .display-tc h2 {
            margin: 0;
            padding: 0;
            color: white;
        }
        #gtco-header .display-tc h1,
        #gtco-counter .display-tc h1,
        .gtco-cover .display-tc h1 {
            margin-bottom: 0px;
            font-size: 59px;
            line-height: 1.5;
            font-weight: 300;
        }
        @media screen and (max-width: 768px) {
            #gtco-header .display-tc h1,
            #gtco-counter .display-tc h1,
            .gtco-cover .display-tc h1 {
                font-size: 34px;
                line-height: 1.2;
                margin-bottom: 10px;
            }
        }
        #gtco-header .display-tc h2,
        #gtco-counter .display-tc h2,
        .gtco-cover .display-tc h2 {
            font-weight: 300;
            font-size: 22px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        #gtco-counter {
            text-align: center;
        }
        #gtco-counter .counter {
            font-size: 50px;
            margin-bottom: 10px;
            color: #09C6AB;
            font-weight: 100;
            display: block;
        }
        #gtco-counter .counter-label {
            margin-bottom: 0;
            text-transform: uppercase;
            color: rgba(0, 0, 0, 0.5);
            letter-spacing: .1em;
        }
        @media screen and (max-width: 768px) {
            #gtco-counter .feature-center {
                margin-bottom: 50px;
            }
        }
        #gtco-counter .icon {
            width: 70px;
            height: 70px;
            text-align: center;
            margin-bottom: 20px;
            background: none !important;
            border: none !important;
        }
        #gtco-counter .icon i {
            height: 70px;
        }
        #gtco-counter .icon i:before {
            color: #cccccc;
            display: block;
            text-align: center;
            margin-left: 3px;
        }

        #gtco-features,
        #gtco-features-2,
        #gtco-products,
        #gtco-services,
        #gtco-subscribe,
        #gtco-footer,
        .gtco-section {
            padding: 3em 0;
            clear: both;
            position: relative;
        }
        @media screen and (max-width: 768px) {
            #gtco-features,
            #gtco-features-2,
            #gtco-products,
            #gtco-services,
            #gtco-subscribe,
            #gtco-footer,
            .gtco-section {
                padding: 2em 0;
            }
        }
        #gtco-features.border-bottom,
        #gtco-features-2.border-bottom,
        #gtco-products.border-bottom,
        #gtco-services.border-bottom,
        #gtco-subscribe.border-bottom,
        #gtco-footer.border-bottom,
        .gtco-section.border-bottom {
            border-bottom: 1px solid #e6e6e6;
        }

        #gtco-features {
            background: #09C6AB;
        }
        #gtco-features .gtco-heading h2 {
            color: #fff;
        }
        #gtco-features .gtco-heading p {
            color: rgba(255, 255, 255, 0.7);
        }
        #gtco-features .feature-center {
            color: #fff;
        }
        #gtco-features .feature-center .icon {
            width: 90px;
            height: 90px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            background: #09C6AB;
        }
        #gtco-features .feature-center .icon i {
            color: #fff;
            font-size: 40px;
            font-style: normal;
        }
        #gtco-features .feature-center h3 {
            font-weight: 400;
            color: #fff;
        }
        #gtco-features .feature-center p {
            color: rgba(255, 255, 255, 0.7);
        }

        #gtco-features-2 {
            background: #efefef;
            position: relative;
            float: left;
            width: 100%;
        }

        .feature-center {
            text-align: center;
            padding-left: 10px;
            padding-right: 10px;
            float: left;
            width: 100%;
            margin-bottom: 40px;
        }
        @media screen and (max-width: 768px) {
            .feature-center {
                margin-bottom: 50px;
            }
        }
        .feature-center .icon {
            width: 90px;
            height: 90px;
            display: table;
            text-align: center;
            margin: 0 auto 40px auto;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        .feature-center .icon i {
            display: table-cell;
            vertical-align: middle;
            height: 90px;
            font-size: 40px;
            line-height: 40px;
            color: #cccccc;
        }
        .feature-center p, .feature-center h3 {
            margin-bottom: 30px;
        }
        .feature-center h3 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #09C6AB;
            position: relative;
        }

        .feature-left {
            float: left;
            width: 100%;
            margin-bottom: 30px;
            position: relative;
        }
        .feature-left .icon {
            float: left;
            text-align: center;
            width: 15%;
        }
        .feature-left .icon i {
            display: table-cell;
            vertical-align: middle;
            font-size: 40px;
            color: #09C6AB;
        }
        .feature-left .feature-copy {
            float: right;
            width: 80%;
        }
        .feature-left .feature-copy h3 {
            font-size: 18px;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .gtco-heading {
            margin-bottom: 1em;
        }
        .gtco-heading.gtco-heading-sm {
            margin-bottom: 2em;
        }
        .gtco-heading h2 {
            font-size: 50px;
            margin-bottom: 10px;
            line-height: 1.5;
            font-weight: 300;
            color: #000;
            position: relative;
        }
        @media screen and (max-width: 768px) {
            .gtco-heading h2 {
                font-size: 26px;
            }
        }
        .gtco-heading p {
            font-size: 20px;
            line-height: 1.5;
            color: gray;
        }

        #gtco-products {
            background: #008ee0;
        }
        #gtco-products .item img {
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            -ms-border-radius: 7px;
            border-radius: 7px;
        }
        #gtco-products .gtco-heading h2 {
            color: #fff;
        }
        #gtco-products .gtco-heading p {
            color: rgba(255, 255, 255, 0.8);
        }

        #gtco-subscribe {
            background: #0098EF;
        }
        #gtco-subscribe .form-control {
            background: transparent;
            color: #fff;
            font-size: 16px !important;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.2) !important;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        #gtco-subscribe .form-control:focus {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.8) !important;
        }
        #gtco-subscribe .form-control::-webkit-input-placeholder {
            color: #fff;
        }
        #gtco-subscribe .form-control:-moz-placeholder {
            /* Firefox 18- */
            color: #fff;
        }
        #gtco-subscribe .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: #fff;
        }
        #gtco-subscribe .form-control:-ms-input-placeholder {
            color: #fff;
        }
        #gtco-subscribe .btn {
            height: 46px;
            border: none !important;
            background: #09C6AB;
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 400;
            padding-left: 50px;
            padding-right: 50px;
        }
        #gtco-subscribe .form-inline .form-group {
            width: 100% !important;
            margin-bottom: 10px;
        }
        #gtco-subscribe .form-inline .form-group .form-control {
            width: 100%;
        }
        #gtco-subscribe .gtco-heading {
            margin-bottom: 30px;
        }
        #gtco-subscribe .gtco-heading h2 {
            color: #fff;
        }
        #gtco-subscribe .gtco-heading p {
            color: rgba(255, 255, 255, 0.5);
        }

        #gtco-footer .gtco-footer-links {
            padding: 0;
            margin: 0 0 20px 0;
            float: left;
            width: 100%;
        }
        #gtco-footer .gtco-footer-links li {
            padding: 0;
            margin: 0 0 15px 0;
            list-style: none;
            line-height: 1;
        }
        #gtco-footer .gtco-footer-links li a {
            text-decoration: none;
        }
        #gtco-footer .gtco-footer-links li a:hover {
            text-decoration: underline;
        }
        #gtco-footer .gtco-widget {
            margin-bottom: 30px;
        }
        #gtco-footer .gtco-widget h3 {
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        #gtco-footer .gtco-widget .gtco-quick-contact {
            padding: 0;
            margin: 0;
        }
        #gtco-footer .gtco-widget .gtco-quick-contact li {
            padding: 0;
            margin: 0 0 10px 0;
            list-style: none;
        }
        #gtco-footer .gtco-widget .gtco-quick-contact li i {
            width: 30px;
            float: left;
            font-size: 18px;
            position: relative;
            margin-top: 4px;
            display: -moz-inline-stack;
            display: inline-block;
            zoom: 1;
            *display: inline;
        }
        #gtco-footer .footer-logo span {
            color: #09C6AB;
        }
        #gtco-footer .copyright {
            color: #b3b3b3;
            /*padding-top: 3em;*/
            /*margin-top: 3em;*/
            border-top: 1px solid #f2f2f2;
        }
        @media screen and (max-width: 768px) {
            #gtco-footer .copyright .pull-left,
            #gtco-footer .copyright .pull-right {
                float: none !important;
                text-align: center;
            }
        }
        #gtco-footer .copyright .block {
            display: block;
        }

        #gtco-offcanvas {
            position: absolute;
            z-index: 1901;
            width: 270px;
            background: black;
            top: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 45px 40px 40px 40px;
            overflow-y: auto;
            display: none;
            -moz-transform: translateX(270px);
            -webkit-transform: translateX(270px);
            -ms-transform: translateX(270px);
            -o-transform: translateX(270px);
            transform: translateX(270px);
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        @media screen and (max-width: 768px) {
            #gtco-offcanvas {
                display: block;
            }
        }
        .offcanvas #gtco-offcanvas {
            -moz-transform: translateX(0px);
            -webkit-transform: translateX(0px);
            -ms-transform: translateX(0px);
            -o-transform: translateX(0px);
            transform: translateX(0px);
        }
        #gtco-offcanvas a {
            color: rgba(255, 255, 255, 0.5);
        }
        #gtco-offcanvas a:hover {
            color: rgba(255, 255, 255, 0.8);
        }
        #gtco-offcanvas ul {
            padding: 0;
            margin: 0;
        }
        #gtco-offcanvas ul li {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        #gtco-offcanvas ul li > ul {
            padding-left: 20px;
            display: none;
        }
        #gtco-offcanvas ul li.offcanvas-has-dropdown > a {
            display: block;
            position: relative;
        }
        #gtco-offcanvas ul li.offcanvas-has-dropdown > a:after {
            position: absolute;
            right: 0px;
            font-family: 'icomoon';
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            /* Better Font Rendering =========== */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            content: "\e921";
            font-size: 20px;
            color: rgba(255, 255, 255, 0.2);
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        #gtco-offcanvas ul li.offcanvas-has-dropdown.active a:after {
            -webkit-transform: rotate(-180deg);
            -moz-transform: rotate(-180deg);
            -ms-transform: rotate(-180deg);
            -o-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }

        .uppercase {
            font-size: 14px;
            color: #000;
            margin-bottom: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .gototop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .gototop.active {
            opacity: 1;
            visibility: visible;
        }
        .gototop a {
            width: 50px;
            height: 50px;
            display: table;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            text-align: center;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
        }
        .gototop a i {
            height: 50px;
            display: table-cell;
            vertical-align: middle;
        }
        .gototop a:hover, .gototop a:active, .gototop a:focus {
            text-decoration: none;
            outline: none;
        }

        .gtco-nav-toggle {
            width: 25px;
            height: 25px;
            cursor: pointer;
            text-decoration: none;
        }
        .gtco-nav-toggle.active i::before, .gtco-nav-toggle.active i::after {
            background: #444;
        }
        .gtco-nav-toggle:hover, .gtco-nav-toggle:focus, .gtco-nav-toggle:active {
            outline: none;
            border-bottom: none !important;
        }
        .gtco-nav-toggle i {
            position: relative;
            display: inline-block;
            width: 25px;
            height: 2px;
            color: #252525;
            font: bold 14px/.4 Helvetica;
            text-transform: uppercase;
            text-indent: -55px;
            background: #252525;
            transition: all .2s ease-out;
        }
        .gtco-nav-toggle i::before, .gtco-nav-toggle i::after {
            content: '';
            width: 25px;
            height: 2px;
            background: #252525;
            position: absolute;
            left: 0;
            transition: all .2s ease-out;
        }
        .gtco-nav-toggle.gtco-nav-white > i {
            color: #fff;
            background: #fff;
        }
        .gtco-nav-toggle.gtco-nav-white > i::before, .gtco-nav-toggle.gtco-nav-white > i::after {
            background: #fff;
        }

        .gtco-nav-toggle i::before {
            top: -7px;
        }

        .gtco-nav-toggle i::after {
            bottom: -7px;
        }

        .gtco-nav-toggle:hover i::before {
            top: -10px;
        }

        .gtco-nav-toggle:hover i::after {
            bottom: -10px;
        }

        .gtco-nav-toggle.active i {
            background: transparent;
        }

        .gtco-nav-toggle.active i::before {
            top: 0;
            -webkit-transform: rotateZ(45deg);
            -moz-transform: rotateZ(45deg);
            -ms-transform: rotateZ(45deg);
            -o-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .gtco-nav-toggle.active i::after {
            bottom: 0;
            -webkit-transform: rotateZ(-45deg);
            -moz-transform: rotateZ(-45deg);
            -ms-transform: rotateZ(-45deg);
            -o-transform: rotateZ(-45deg);
            transform: rotateZ(-45deg);
        }

        .gtco-nav-toggle {
            position: absolute;
            right: 0px;
            top: 10px;
            z-index: 21;
            padding: 6px 0 0 0;
            display: block;
            margin: 0 auto;
            display: none;
            height: 44px;
            width: 44px;
            z-index: 2001;
            border-bottom: none !important;
        }
        @media screen and (max-width: 768px) {
            .gtco-nav-toggle {
                display: block;
            }
        }

        .btn {
            margin-right: 4px;
            margin-bottom: 4px;
            font-family: "Lato", Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            padding: 8px 30px;
        }
        .btn.btn-md {
            padding: 8px 20px !important;
        }
        .btn.btn-lg {
            padding: 18px 36px !important;
        }
        .btn:hover, .btn:active, .btn:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        .btn-primary {
            background: #09C6AB;
            color: #fff;
            border: 2px solid #09C6AB !important;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background: #0adec0 !important;
            border-color: #0adec0 !important;
        }
        .btn-primary.btn-outline {
            background: transparent;
            color: #09C6AB;
            border: 2px solid #09C6AB;
        }
        .btn-primary.btn-outline:hover, .btn-primary.btn-outline:focus, .btn-primary.btn-outline:active {
            background: #09C6AB;
            color: #fff;
        }

        .btn-success {
            background: #5cb85c;
            color: #fff;
            border: 2px solid #5cb85c;
        }
        .btn-success:hover, .btn-success:focus, .btn-success:active {
            background: #4cae4c !important;
            border-color: #4cae4c !important;
        }
        .btn-success.btn-outline {
            background: transparent;
            color: #5cb85c;
            border: 2px solid #5cb85c;
        }
        .btn-success.btn-outline:hover, .btn-success.btn-outline:focus, .btn-success.btn-outline:active {
            background: #5cb85c;
            color: #fff;
        }

        .btn-info {
            background: #5bc0de;
            color: #fff;
            border: 2px solid #5bc0de;
        }
        .btn-info:hover, .btn-info:focus, .btn-info:active {
            background: #46b8da !important;
            border-color: #46b8da !important;
        }
        .btn-info.btn-outline {
            background: transparent;
            color: #5bc0de;
            border: 2px solid #5bc0de;
        }
        .btn-info.btn-outline:hover, .btn-info.btn-outline:focus, .btn-info.btn-outline:active {
            background: #5bc0de;
            color: #fff;
        }

        .btn-warning {
            background: #f0ad4e;
            color: #fff;
            border: 2px solid #f0ad4e;
        }
        .btn-warning:hover, .btn-warning:focus, .btn-warning:active {
            background: #eea236 !important;
            border-color: #eea236 !important;
        }
        .btn-warning.btn-outline {
            background: transparent;
            color: #f0ad4e;
            border: 2px solid #f0ad4e;
        }
        .btn-warning.btn-outline:hover, .btn-warning.btn-outline:focus, .btn-warning.btn-outline:active {
            background: #f0ad4e;
            color: #fff;
        }

        .btn-danger {
            background: #d9534f;
            color: #fff;
            border: 2px solid #d9534f;
        }
        .btn-danger:hover, .btn-danger:focus, .btn-danger:active {
            background: #d43f3a !important;
            border-color: #d43f3a !important;
        }
        .btn-danger.btn-outline {
            background: transparent;
            color: #d9534f;
            border: 2px solid #d9534f;
        }
        .btn-danger.btn-outline:hover, .btn-danger.btn-outline:focus, .btn-danger.btn-outline:active {
            background: #d9534f;
            color: #fff;
        }

        .btn-white {
            background: #fff;
            color: #000;
            border: 2px solid #fff;
        }
        .btn-white:hover, .btn-white:focus, .btn-white:active {
            color: #000;
            background: #f2f2f2 !important;
            border-color: #f2f2f2 !important;
        }
        .btn-white.btn-outline {
            color: #fff;
            border: 2px solid #fff;
        }
        .btn-white.btn-outline:hover, .btn-white.btn-outline:focus, .btn-white.btn-outline:active {
            background: #fff;
            color: #000;
            border: 2px solid #fff;
        }

        .btn-outline {
            background: none;
            border: 2px solid gray;
            font-size: 16px;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .btn-outline:hover, .btn-outline:focus, .btn-outline:active {
            box-shadow: none;
        }

        .btn.with-arrow {
            position: relative;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .btn.with-arrow i {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            right: 0px;
            top: 50%;
            margin-top: -8px;
            -webkit-transition: 0.2s;
            -o-transition: 0.2s;
            transition: 0.2s;
        }
        .btn.with-arrow:hover {
            padding-right: 50px;
        }
        .btn.with-arrow:hover i {
            color: #fff;
            right: 18px;
            visibility: visible;
            opacity: 1;
        }

        .form-control {
            box-shadow: none;
            /*background: transparent;*/
            border: 2px solid rgba(0, 0, 0, 0.1);
            height: 46px;
            font-size: 16px;
            font-weight: 300;
            padding-left: 15px;
            padding-right: 15px;
        }
        .form-control:active, .form-control:focus {
            outline: none;
            box-shadow: none;
            border-color: #09C6AB;
        }

        .row-mt-5em {
            margin-top: 5em;
        }
        @media screen and (max-width: 768px) {
            .row-mt-5em {
                margin-top: 3em;
            }
        }

        .mt-sm {
            margin-top: 6em;
        }
        @media screen and (max-width: 768px) {
            .mt-sm {
                margin-top: 3em;
            }
        }

        .row-pb-md {
            padding-bottom: 4em !important;
        }

        .row-pb-sm {
            padding-bottom: 2em !important;
        }

        .gtco-loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../../../../../../Aptech/GitHub/Project-Term-2/dat/traveler-master/images/loader.gif) center no-repeat #fff;
        }

        .js .animate-box {
            opacity: 0;
        }

        @media screen and (max-width: 768px) {
            .gtco-nav .gtco-contact {
                text-align: left !important;
            }
        }
        .gtco-nav .gtco-contact ul {
            padding: 0;
            margin: 0 0 20px 0;
        }
        .gtco-nav .gtco-contact ul li {
            padding: 0;
            margin: 0;
        }
        .gtco-nav .gtco-contact ul li a {
            font-size: 14px;
            font-weight: bold !important;
            margin-left: 0px;
        }
        .gtco-nav .gtco-contact ul li a i {
            color: #09C6AB;
        }
        .gtco-nav .gtco-contact ul li a:hover i {
            color: #fff;
        }

        .gtco-flex {
            flex-wrap: wrap;
            -webkit-flex-wrap: wrap;
            -moz-flex-wrap: wrap;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            position: relative;
            float: left;
        }

        /* Owl Override Style */
        .owl-carousel .owl-controls,
        .owl-carousel-posts .owl-controls {
            margin-top: 0;
        }

        .owl-carousel .owl-controls .owl-nav .owl-next,
        .owl-carousel .owl-controls .owl-nav .owl-prev,
        .owl-carousel-posts .owl-controls .owl-nav .owl-next,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev {
            top: 50%;
            margin-top: -39px;
            z-index: 9999;
            position: absolute;
            -webkit-transition: 0.2s;
            -o-transition: 0.2s;
            transition: 0.2s;
        }

        .owl-carousel-posts .owl-controls .owl-nav .owl-next,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev {
            top: 24%;
        }

        .owl-carousel .owl-controls .owl-nav .owl-next,
        .owl-carousel-posts .owl-controls .owl-nav .owl-next {
            right: 20px;
        }
        .owl-carousel .owl-controls .owl-nav .owl-next:hover,
        .owl-carousel-posts .owl-controls .owl-nav .owl-next:hover {
            margin-right: -10px;
        }

        .owl-carousel .owl-controls .owl-nav .owl-prev,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev {
            left: 20px;
        }
        .owl-carousel .owl-controls .owl-nav .owl-prev:hover,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev:hover {
            margin-left: -10px;
        }

        .owl-carousel-posts .owl-controls .owl-nav .owl-next i,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev i,
        .owl-carousel-fullwidth .owl-controls .owl-nav .owl-next i,
        .owl-carousel-fullwidth .owl-controls .owl-nav .owl-prev i {
            color: #444;
        }
        .owl-carousel-posts .owl-controls .owl-nav .owl-next:hover i,
        .owl-carousel-posts .owl-controls .owl-nav .owl-prev:hover i,
        .owl-carousel-fullwidth .owl-controls .owl-nav .owl-next:hover i,
        .owl-carousel-fullwidth .owl-controls .owl-nav .owl-prev:hover i {
            color: #000;
        }

        .owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-next i,
        .owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-prev i {
            color: #fff;
        }
        .owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-next:hover i,
        .owl-carousel-fullwidth.fh5co-light-arrow .owl-controls .owl-nav .owl-prev:hover i {
            color: #fff;
        }

        @media screen and (max-width: 768px) {
            .owl-theme .owl-controls .owl-nav {
                display: none;
            }
        }

        .owl-theme .owl-controls .owl-nav [class*="owl-"] {
            background: none !important;
        }
        .owl-theme .owl-controls .owl-nav [class*="owl-"] i {
            font-size: 24px;
            background: #f54c53 !important;
            padding: 12px;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .owl-theme .owl-controls .owl-nav [class*="owl-"]:hover i, .owl-theme .owl-controls .owl-nav [class*="owl-"]:focus i {
            background: #f54c53 !important;
        }

        .owl-theme .owl-dots {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        .owl-carousel-fullwidth.owl-theme .owl-dots {
            bottom: 0;
            margin-bottom: -2.5em;
        }

        .owl-theme .owl-dots .owl-dot span {
            width: 10px;
            height: 10px;
            background: #09C6AB;
            -webkit-transition: 0.2s;
            -o-transition: 0.2s;
            transition: 0.2s;
            border: 2px solid transparent;
        }
        .owl-theme .owl-dots .owl-dot span:hover {
            background: none;
            border: 2px solid #09C6AB;
        }

        .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
            background: none;
            border: 2px solid #09C6AB;
        }

        .fh5co-card-item {
            display: block;
            width: 100%;
            position: relative;
            background: #fff;
            overflow: hidden;
            z-index: 9;
            bottom: 0;
            margin-bottom: 30px;
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.08);
            -o-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.08);
            box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.08);
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            -ms-border-radius: 0px;
            border-radius: 0px;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .fh5co-card-item figure {
            height: 240px;
            overflow: hidden;
            z-index: 12;
            position: relative;
        }
        .fh5co-card-item figure .overlay {
            opacity: 0;
            visibility: hidden;
            z-index: 10;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            background: rgba(0, 0, 0, 0.4);
            -webkit-transition: 0.7s;
            -o-transition: 0.7s;
            transition: 0.7s;
        }
        .fh5co-card-item figure .overlay i {
            z-index: 12;
            color: #fff;
            font-size: 30px;
            position: absolute;
            margin-left: -15px;
            margin-top: -45px;
            top: 50%;
            left: 50%;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .fh5co-card-item img {
            z-index: 8;
            opacity: 1;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
        }
        .fh5co-card-item .fh5co-text {
            padding: 0px 10px 10px 20px;
            text-align: center;
        }
        .fh5co-card-item .fh5co-text h2, .fh5co-card-item .fh5co-text span {
            text-decoration: none !important;
        }
        .fh5co-card-item .fh5co-text h2 {
            font-size: 20px;
            font-weight: 400;
            margin: 0 0 10px 0;
            color: #09C6AB;
        }
        .fh5co-card-item .fh5co-text span {
            color: #b3b3b3;
            font-size: 16px;
            font-weight: 400;
        }
        .fh5co-card-item .fh5co-text p {
            color: #000;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .fh5co-card-item .fh5co-text span.btn {
            color: #fff !important;
            opacity: 1;
            visibility: visible;
            bottom: 0;
            background: #1a1a1a;
            border: 2px solid #1a1a1a !important;
            position: relative;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }
        .fh5co-card-item:hover, .fh5co-card-item:focus {
            bottom: 7px;
            text-decoration: none;
            -webkit-box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.19);
            -ms-box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.19);
            -o-box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.19);
            box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.19);
        }
        .fh5co-card-item:hover img, .fh5co-card-item:focus img {
            -webkot-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -ms-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .fh5co-card-item:hover span.btn, .fh5co-card-item:focus span.btn {
            opacity: 1;
            visibility: visible;
            bottom: 0px;
            border: 2px solid #0adec0 !important;
            background: #0adec0 !important;
        }
        .fh5co-card-item:hover figure .overlay, .fh5co-card-item:focus figure .overlay {
            opacity: 1;
            visibility: visible;
        }
        .fh5co-card-item:hover figure .overlay i, .fh5co-card-item:focus figure .overlay i {
            margin-top: -15px;
        }
        .fh5co-card-item:hover h2, .fh5co-card-item:hover span, .fh5co-card-item:focus h2, .fh5co-card-item:focus span {
            text-decoration: none !important;
        }

        @media screen and (max-width: 768px) {
            .macbook-wrap img {
                max-width: 100%;
            }
        }

        .price-box {
            background: #fff;
            border: 2px solid #ECEEF0;
            text-align: center;
            padding: 30px;
            margin-bottom: 40px;
            position: relative;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            border-radius: 5px;
        }
        .price-box.popular {
            border: 2px solid #09C6AB;
        }
        .price-box.popular .popular-text {
            top: 0;
            left: 50%;
            margin-left: -54px;
            margin-top: -2em;
            position: absolute;
            padding: 4px 20px;
            background: #09C6AB;
            color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            border-radius: 4px;
        }
        .price-box.popular .popular-text:after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -10px;
            border-top: 10px solid black;
            border-top-color: #09C6AB;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
        }

        .pricing-plan {
            margin: 0 0 30px 0;
            padding: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .price {
            font-size: 50px;
            color: #000;
        }
        .price .currency {
            font-size: 20px;
            top: -1.2em;
        }
        .price small {
            font-size: 16px;
        }

        .pricing-info {
            padding: 0;
            margin: 0 0 30px 0;
        }
        .pricing-info li {
            padding: 0;
            margin: 0;
            list-style: none;
            text-align: center;
        }

        .fh5co-faq-list {
            margin: 0;
            padding: 0;
        }
        .fh5co-faq-list li {
            margin: 0 0 40px 0;
            padding: 0;
            line-height: 1.5;
            list-style: none;
        }
        @media screen and (max-width: 768px) {
            .fh5co-faq-list li {
                margin: 0 0 20px 0;
            }
        }
        .fh5co-faq-list li h2 {
            font-size: 26px;
            font-weight: 300;
            margin-bottom: 15px;
        }
        @media screen and (max-width: 768px) {
            .fh5co-faq-list li h2 {
                font-size: 26px;
            }
        }

        /*# sourceMappingURL=style.css.map */




        /*-------------------CSS FOR MAIL-----------------------------*/


        .mail-page{
            width: 800px;
            color:black;
        }
        .mail-header{
            display: flex;
            align-items: center;
            height: 100px;
            font-weight: bold;
        }
        .mail-header h3{
            color: #1a967b;
            margin: 0;
        }
        .first-thanks{
            font-style: italic;
            font-size: 80%;
        }
        .itinerary{
            font-weight: bold;
            font-size: 1.2em;
            margin: 10px 0;
        }
        .ticket-details{
            background-color: #09c6ab;
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 10px 5px 20px;
            color: white;
        }
        .depart-date{
            padding-left: 20px;
            font-size: 1.1em;
        }
        .ticket-details table tr td:nth-child(2){
            padding-left: 15px;
        }
        .ticket-details table tr td:nth-child(1)
        {
            vertical-align: top;
            font-weight: bold;
        }
        .ticket-details div:nth-child(2){
            border-left: 1px solid white;
            display: block;
            text-align: center;
        }
        .ticket-details div:nth-child(2)>img{
            margin: 10px 10px;
        }
        .mail-page>p{
            padding-top: 10px;
            border-top: 1px solid grey;
            text-transform: uppercase;
            font-weight: bold;
        }
        .departure-details{
            margin: 10px 5px 20px;
        }
        .departure-details div:nth-child(1){
            background-color: #c4c4c4;
            position: relative;
            padding: 20px 0 0 20px;
            clip-path: polygon(15% 0%,100% 0%,100% 100%, 0% 100%,0% 15%);
        }
        .departure-details div:nth-child(2){
            padding-right: 0;
        }

        .departure-details div:nth-child(1) p:first-child{
            font-weight: bold;
            font-size: 1.1em;
        }
        .departure-details table{
            width: 100%;
        }
        .departure-details table tr td:first-child{
            width: 238px;
            border-right: grey 1px solid;
        }
        .departure-details span{
            font-weight: bold;
            padding-left: 15px;
            font-size: 1.1em;
        }
        .departure-details table tr td:last-child{
            padding-left: 15px;
        }

        .payment-details table{
            width: 80%;
            margin: 0 auto 10px;
        }
        .payment-details table tr td{
            border: 1px solid grey;
            padding-left: 10px;
        }
        .payment-details table tr:nth-child(4) td:first-child{
            width: 120px;
        }
        .payment-details>p,a{
            margin: 15px auto 0;
            text-align: center;
        }
        .payment-details a button{
            margin-top: -5px;
            background-image: linear-gradient(#9a8314,#b99920);
            border: 1px solid #b99920;
            border-radius: 5px;
            color: white;
        }
        .mail-note{
            font-size: 0.9em;
            margin: 10px 10px;
            font-style: italic;
        }
        p.hotline{
            text-transform: none;
            border: none;
            background-color: #09C6AB;
            color: white;
            text-align: right;
            padding: 10px 0;
            margin: 0;
            font-size: 0.9em;
        }
        p.hotline>a{
            color: #3434ff;
        }
        p.last-thanks{
            border: none;
            text-transform: none;
            font-style: italic;
            font-weight: normal;
        }
        .mail-page ul li{
            list-style-type: decimal;
        }


        /*----------------------CSS FOR SEAT MAP--------------------------*/


        .seat-map{
            border-left: 1px solid black;
            border-right: 1px solid black;
        }
        table.business-class,table.economy-class{
            width: 100%;
        }
        table tr td div img{
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .seat-row td{

            font-weight: bold;
        }
        table.business-class tr td:not(td:nth-child(3)){
            width: 55px;
        }
        table.business-class tr td:nth-child(2),
        table.business-class tr td:nth-child(3),
        table.business-class tr td:nth-child(5),
        table.economy-class tr td:nth-child(4),
        table.economy-class tr td:nth-child(8){
            font-weight: bold;
        }
        table.business-class tr td,
        table.economy-class tr td{
            text-align: center;
        }
        .left-exit,.right-exit,.labotory,.kitchen,.left-labotory,.right-labotory{
            position: relative;
        }
        .left-exit,.right-exit{
            width: 15px;
            height: 15px;
        }
        .labotory,.kitchen,.left-labotory,.right-labotory{
            width: 20px;
            height: 20px;
        }
        .plane-320 .left-exit,.plane-787 .left-exit{
            top:5px;
            left:-15px;
        }
        .plane-320 .right-exit,.plane-787 .right-exit{
            top:5px;
            left:237px
        }
        .plane-320 .kitchen{
            top:5px;
            left:137px;
        }
        .plane-320 .labotory{
            top:5px;
            left:10px;
        }
        table.economy-class:last-of-type{
            margin-bottom: 10px;
        }
        .plane-787 .left-labotory{
            top: 5px;
            left: 0;
        }
        .plane-787 .right-labotory{
            top:5px;
            left:135px;
        }
        .plane-787 .kitchen{
            top: 5px;
            left: 65px;
        }
        div.seat-map>div{
            margin: 0;
        }

        /*--------------LOGIN PAGE-----------------------*/

        .form-signup>label:first-of-type{
            margin-right: 255px;
        }
        .form-signup>label:nth-of-type(3){
            margin-right: 228px;
        }
        .form-signup>label:nth-of-type(5){
            margin-right: 225px;
        }
        .form-signin>div>input{
            background-color: white;
            width: 40%;
            margin: 0 auto;
        }
        .form-signin button{
            width: 40%;
            margin: 0 auto;
        }
        .form-signin>div.mt-text{
            margin: 30px 0 !important;
        }
        .form-signin input[type='checkbox']{
            position: unset;
        }
        .form-signin p{
            color: white;
            font-size: 0.8em;
            font-style: italic;
            width: 40%;
            text-align: right;
            margin: 0 auto;
            margin-top: 10px;
        }
        .policy-box{
            height: 200px;
            overflow: scroll;
            margin-top: 20px;
            font-size: 0.8em;
        }
        .policy-box p:first-child{
            text-align: center;
            margin-top: 15px;
            font-size: 1.3em;
            color: #09c6ab;
        }
        .condition-term{
            text-align: center;
            margin: 20px 0;
        }
        h1.su-text{
            text-align: center;
            font-size: 59px;
            line-height: 1.5;
            font-weight: 300;
        }
        .form-signup{
            width: 60%;
            margin: 0 auto;
        }
        .form-signup input{
            margin-top: 10px;
            margin-bottom: 10px;
            display: inline-block;
        }
        .form-signup button:hover{
            color: unset;
        }
        #su-firstname,#su-lastname,#su-phonenumber,#su-creditcard{
            width: 48%;
        }
        #su-lastname,#su-creditcard{
            margin-left: 22px;
        }
        #su-sex{
            width: 35%;
        }
        #su-age{
            width: 61%;
            margin-left: 22px;
        }

        /*--------------POLICY-PAGE------------------*/

        .policy-page div img{
            width: 316px;
            cursor: pointer;
        }
        .policy-page span:first-of-type{
            position: absolute;
            top: 140px;
            left: 20px;
            color: ghostwhite;
            font-size: 1.3em;
            cursor: pointer;
        }
        .policy-page span:last-of-type{
            position: absolute;
            cursor: pointer;
            top: 140px;
            left: 310px;
            color: ghostwhite;
            font-size: 1.3em;
        }
        .policy-page>div:not(div:nth-of-type(1)){
            margin-top: 30px;
            border-top: 0.5px solid #f2f2f2;
            padding-top: 20px;
        }

        /*------------------------FLIGHT-STATUS--------------------*/
        .search-flight{
            width: 50%;
            margin: 0 auto;
        }

        .search-flight input{
            display: inline-block;
            background-color: white;
            width: 45%;
        }
        .search-flight button{
            width: 46px;
            height: 46px;
            margin-left: 10px;
            border-radius: 5px;
        }
        .ticket-form{
            background-color: white;
            width: 100%;
            margin: 0;
        }

        .ticket-form div.col-md-12 img{
            width:200px;
        }
        .ticket-form div.col-md-1>img{
            width: 40px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .ticket-form div.row{
            margin: 0;
        }
        .ticket-logo{
            background-color: #09c5a9;
            color: white;
            text-transform: uppercase;
            text-align: center;
            position: relative;
        }
        .ticket-logo img:first-of-type{
            float:left;
        }
        .ticket-logo img:last-of-type{
            float: right;
        }
        .ticket-logo span{
            position: absolute;
            top: 16%;
            left: 33%;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 3px;
            font-size: 25px;
        }
        .bound{
            background-color: #3a3a3b;
            color: white;
            height: 30px;
        }
        .ticket-form>div:nth-child(2) p{
            margin: 0;
            text-align: center;
            font-style: italic;
        }
        .ticket-form>div:nth-child(3){
            margin-top:15px
        }
        .outbound span,.inbound span{
            text-transform: uppercase;
            font-size: 0.7em;
            position: absolute;
            top:0;
            left:15px;
            font-style: italic;
        }
        .outbound p,.inbound p {
            padding-top: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .passenger-ticket table{
            width: 100%;
        }
        .passenger-ticket table th{
            background-color: #09c5a9;
            color: white;
            height: 91.11px ;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 20px;
        }
        .passenger-ticket table td{
            height: 20px;
            font-size: 14px;
        }
        .passenger-ticket table td>a:hover{
            color: goldenrod;
        }
        .result-form table{
            width: 100%;
            margin:0 auto;
            background-color: white;
            text-align: center;
        }
        .result-form th{
            background-color: #09c5a9;
            color: white;
            text-transform: uppercase;
            font-size: 17px;
            height: 60px;
            text-align: center;
            letter-spacing: 1px;
        }
        .result-form td{
            height: 60px;
        }
        /*-------------SVG-ICON----------------*/
        .svg-icon {
            width: 25px;
            height:25px;
            position: absolute;
            top: 9px;
            left:9px
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
            fill: white;
        }

        .svg-icon circle {
            stroke: white;
            stroke-width: 1;
        }



        /*-----------------------------------------------------------------------dat style
        ---------------------------------------------
        --------------------------------------------------------*/


        .gtco-nav .overlay{
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }
        .gtco-nav a{
            padding: 0;
        }
        .btn-date{
            border: 2px solid rgba(228,228,228,0.85);
            height: 100%;
            width: 100%;
            padding: 5px;
            text-align: center;
        }
        .btn_passenger{
            border: 2px solid rgba(228,228,228,0.85);
            height: 90%;
            width: 100%;
            text-align: center;
            font-weight: bold;
            padding-top: 15px;
        }
        .selected{
            outline: none;
            box-shadow: none;
            border-color: #09C6AB;
        }
        .gtco-nav ul li.has-dropdown .dropdown{
            width: 170px;
            background-color: rgba(30,46,73,0.85);
            color: rgba(255, 255, 255, 0.7);
        }
        .gtco-nav ul li.has-dropdown ul.dropdown:hover{
            background-color: rgba(17, 27, 45, 0.85);
        }
        .gtco-nav ul li.has-dropdown ul.dropdown li a{
            font-size: 16px;
        }
        .gtco-nav ul li.has-dropdown ul.dropdown li a:hover{
            color: white;
        }
        /*.gtco-nav ul li.has-dropdown ul.dropdown li:hover{*/
        /*    background-color: rgba(17, 27, 45, 0.85);*/

        /*}*/
        .overlay_datepicker{
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            content: "";
            z-index: 10;
            visibility: hidden;
        }
        .active{
            visibility: visible;
        }
        #ui-datepicker-div{
            z-index: 16 !important;
        }
        #datepicker_outbound{
            position: absolute;
            top: -320px;
            left: -45px;
            z-index: 12;
        }
        .ui-datepicker-prev,.ui-datepicker-next{
            margin-top: 0;
        }
        .ui-datepicker>table tr td{
            width: 41px;
        }
        .ui-datepicker>table tr td a{
            margin-top: 0;
        }
        /*.datepicker{*/
        /*    position: relative;*/
        /*    background-color: white;*/
        /*    z-index: 11;*/
        /*    border: 1px solid black;*/
        /*}*/
        .ui-datepicker a:hover{
            color:  #09C6AB;
        }
        .outbound_day{
            padding: 5px;
            font-size: 25px;
            font-weight: bold;
        }
        .btn-date .icon-plus {
            color: #09C6AB;
            display: block;
            padding-top: 10px;
        }
        .btn-date .icon-plus:before{
            font-size: 50px;
        }
        .display_return_date{
            position: absolute;
            width: 143px;
            display: none;
        }
        .return_day{
            padding: 5px;
            font-size: 25px;
            font-weight: bold;
        }
        .close_return_date_btn{
            position: absolute;
            /*border: none;*/
            background-color: rgba(238,238,238,0.85);
            z-index: 9;
            border-color: rgba(255,255,255,0);
            border-radius: 100%;
            right: 0;
            top: -14px;
            width: 30px;
            display: none;
        }

        .btn_passenger:after{
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
            float: right;
            margin-top: 10px;
        }
        .dropdown .dropdown-menu{
            padding-left: 10px;
            width: 100%;
            border: 2px solid;
        }
        .passenger_input{
            float: right;
            width: 30%;
            margin-right: 20px;
        }
        .passenger_div{
            padding: 10px 0;
        }
        .confirm_div{
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            padding: 3px;
            margin: 0;
            border-top: 1px solid black;
        }
        .dropdown .dropdown-menu .form-check{
            line-height: 30px;
            padding: 10px;
        }
        .dropdown .dropdown-menu .form-check .form-check-label{
            float: right;
            font-size: 16px;
        }
        .class_radio_div{
            background: #fff;
            border: 1px solid black;
            border-radius: 3%;
            position: absolute;
            width: 90%;
            display: none;
            z-index: 14;
            color: black;
        }
        /* The container_radio */
        .container_radio {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 14px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            margin-top: 10px;
        }

        /* Hide the browser's default radio button */
        .container_radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .container_radio {
            cursor: pointer !important;
        }
        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: -1px;
            left: 5px;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container_radio:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .container_radio input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container_radio input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container_radio .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
        .container_radio label{
            font-weight: bold !important;
        }
        .news_section{
            padding-bottom: 0;
            margin-bottom: 1em;
        }
        .news_section .gtco-container a{
            color: black;
        }
        .news_section .gtco-container a:hover{
            color: #0adec0;
        }
        .carousel_item{
            background-color: rgba(244,244,245,0.85);
            padding-top: 30px;
            text-align: center;
            height: 455px;
            width: 90%;
        }
        .carousel_item p:first-of-type{
            padding: 0 20px;
        }
        .carousel_item a.btn.btn-secondary {
            color: white;
            float: bottom !important;
        }
        .carousel_item a.btn.btn-secondary:hover {
            background-color:#0adec0 ;
        }
        .owl-carousel .owl-item img{
            display: inline !important;
            width: 200px !important;
        }
        .carousel_item h2{
            font-weight: 300;
        }
        .owl-dots{
            display: none !important;
        }
        .owl-nav{
            display: none !important;
        }
        .booking-form .input-group-text{
            font-size: 15px;
            width: 51px;
        }
        #gtco-features .gtco-heading a {
            color: #fff;
        }
        #gtco-features .feature-center a{
            color: #fff;
        }

        .profile_form  label h4{
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
        .profile_form .col-xs-6 {
            margin-top: 20px;
        }
        .profile_form input {
            color: black;
            font-weight: 500;
        }
        .profile_form input::placeholder{
            opacity: 1;
            color: black;
        }
        .profile_form ul li{
            border: 2px solid rgba(0, 0, 0, 0.1);
        }
        .profile_form input.file-upload{
            display: none;
        }
        .profile_form .col-sm-3 label{
            border: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 15px;
            color: inherit;
        }

        .form-signin .dp_sign_up{
            color: #09C6AB;
        }
        .form-signin .dp_sign_up:hover{
            color: #0adec0;
            cursor: pointer;
        }
        .sign_up{
            display: none;
        }
        .passenger_form .col-md-8{
            margin: 30px 0;
        }
        .passenges_list form .form-group label h4{
            margin: 0;
        }
        .passenges_list .form-group input{
            margin-bottom: 20px;
        }
        .passenges_list .nav.nav-tabs li a{
            color: black;
        }
        .passenges_list div.row:last-of-type{
            padding-bottom: 30px;
            padding-top: 30px;
            background-color: #f5f5f5;
        }
        .passenges_list div.row:first-of-type{
            margin: 20px 0 20px;
        }
        .nav-tabs > li.active > a{
            color: #0ac5a9 !important;
        }
        .flight_detail table{
            font-size: 13px;
        }
        .flight_detail table tr td:nth-of-type(2)>img{
            width: 30px;
        }
        .flight_detail table:not(table:last-of-type){
            text-align: center;
            border-bottom: 0.5px dashed #a9a8a8;
            margin-bottom: 15px;
            margin-top: 15px;
            width: 100%;
        }
        .flight_detail table tr:first-of-type{
            border-bottom: 0.5px dashed #a9a8a8;
        }
        .flight_detail table:last-of-type{
            width: 100%;
            margin: 0 auto 15px;
        }
        /*.flight_detail table:last-of-type tr:nth-of-type(7) td:nth-of-type(2),*/
        /*.flight_detail table:last-of-type tr:nth-of-type(8) td:nth-of-type(2){*/
        /*  text-align: center;*/
        /*}*/
        .flight_detail table:last-of-type tr th:first-of-type{
            width: 135px
        }
        .flight_detail{
            border: 0.5px dashed #a9a8a8;
            background-color: #fbf4ec61;
        }
        .check_out{
            text-align: justify;
        }
        .check_out .note{
            padding-top: 20px;
            padding-bottom: 30px;
            font-size: 13px;
        }
        .check_out .note span{
            color: #eeb823;
        }
        .check_out .form-check{
            cursor: pointer;
        }
        .check_out .radio_block .form-check label, .radio_buy .form-check label{
            font-size: 20px;
            margin-left: 15px;
            cursor: pointer;
        }
        .check_out .radio_choose{
            margin-bottom: 30px;
            padding-right: 10px;
        }
        .radio_choose_active{
            border: 1px solid #0adec0;
        }

        /*end dat style*/


        /*---------SELECT-FLIGHT------------*/
        .booking-progress{
            width: 100%;
            margin-top: 30px;
        }
        .first-button,.second-button{
            text-align: center;
            color: white;
            font-size: 16px;
            height: 30px;
            line-height: 30px;
            padding: 0;
            margin: 0 0 20px 0;
            width: 27%;
            background-color: #09c5a9;
        }
        .back-icon{
            color: black;
            position: absolute;
            top: 3px;
            left: 110px;
        }

        .disable-button{
            background-color: #b3b3b36b;
            color: #606060;
            cursor: not-allowed;
        }
        .disable-button:first-of-type{
            margin-left: 30px;

        }
        .first-button{
            clip-path: polygon(0% 0%,90% 0%,100% 50%,90% 100%,0% 100%);
        }
        .second-button{
            clip-path: polygon(0% 0%,90% 0%,100% 50%,90% 100%,0% 100%,10% 50%);
            margin-left: -30px !important;
        }
        .date-button{
            background-color: white;
            height: 40px;
            margin: 0 0 30px 0;
            padding: 0;
            text-align: center;
            width: 180px;
            font-size: 12px;
        }
        .date-button:hover{
            font-weight: bold;
        }
        button.date-button.active{
            font-weight: bold;
            color: #000;
        }

        .flight-detail{
            height: 70px;
            width: 100%;
            background-color: white;
            padding: 10px 10px;
            text-align: center;
            border-top: 1px solid #c4c4c4;
            border-bottom: 1px solid #c4c4c4;
            margin: 0 auto;
            margin-bottom: 30px;
            font-size: 14px;
            cursor: pointer;
        }
        .flight-detail table{
            width: 100%;
            text-align: left;
        }
        .flight-detail table tr:first-of-type td:nth-child(1),
        .flight-detail table tr:first-of-type td:nth-child(2),
        .flight-detail table tr:nth-of-type(2) td:nth-child(1){
            text-align: center;
        }

        .flight-detail input{
            width: 15px;
            height: 15px;
            margin: 20px 0;
        }
        .flight-detail div:last-child{
            margin: 5px 0;
        }
        .flight-detail img{
            width: 20px;
        }
        .back-continue button{
            width: 150px;
        }

        /*----------------------------------*/
        .password-change form div.modal-body{
            width: 100%;
        }
        .password-change form div.modal-body label{
            width: 49%;
            border: unset;
        }
        .password-change form input{
            width: 50%;
        }
        .modal-title{
            color: inherit;
            font-size: 18px;
        }
        .modal-header .close{
            margin-top: -10px;
        }
        button.close:focus{
            outline: none;
        }
        #registrationForm label h4,
        #registrationForm input{
            color: #353535;
        }
        #registrationForm input::placeholder{
            color:#777777ba;
        }

        .ui-datepicker-prev.ui-corner-all, .ui-datepicker-next.ui-corner-all {
            margin: 0;
        }


        .select_seats .tab-content #out_bound form .col-md-1,
        .select_seats .tab-content #in_bound form .col-md-1{
            height: 25px;
            width: 25px;
            margin-top: 10px;
        }
        .select_seats ul.nav-tabs li>a{
            color: #777;;
        }
        .select_seats .tab-content .tab-pane form .col-md-7.col-md-push-1 .row .col-md-12 .row{
            margin: 20px 0;
        }
        .select_seats .plane-320 .left-exit,.select_seats .plane-787 .left-exit{
            left: 0;
        }
        .select_seats .plane-320 .right-exit,.select_seats .plane-787 .right-exit{
            left: 204px;
        }
        .select_seats .tab-content .select_seat_passenger{
            background: #2a2a2ac7;
            color: white;
            height: 50px;
            padding-top: 10px;
            cursor: pointer;
            margin-bottom: 20px !important;
        }
        .select_seat_passenger{
            text-transform: uppercase;
        }
        .btn_select_seat{
            color:#eeb823 ;
            text-transform: capitalize;
            font-weight: bold;
        }
        .active_passenger{
            background: #007fa2f2 !important;
            box-shadow: 2px 2px 2px #0f7091;
        }
        .select_seats .tab-content .select_seat_passenger p:hover{
            text-decoration: underline;
        }
        .seat-note{
            font-size: 0.8em;
            font-style: italic;
        }
        form .seat-note:first-of-type{
            margin-top: 15px;
            height: 30px;
            padding: 5px 0 5px 0;
        }
        .seat-img>div{
            margin: 10px 0 10px 0;
        }
        #search-flight{
            width: 90%;
        }
        .seat-img img{
            width: 25px;
            margin-right: 5px;
        }
        .seat-img p{
            margin-bottom: 0;
        }
        .select_seats div.animate-box>div.row:last-child{
            padding: 20px 0;
            background-color: #F5F5F5;
        }
        .modal-backdrop.in{
            opacity: 0;
        }
        .modal-backdrop{
            z-index: auto;
        }
        #cancel button.btn,#reschedule button.btn{
            margin-bottom: 0;
        }
        .passenger-ticket table tr{
            height: 40px;
        }
        .passenger-ticket table tr:nth-of-type(3),
        .passenger-ticket table tr:nth-of-type(4){
            height: 25px;
        }
        #reschedule button.close,#cancel button.close{
            margin-top: -25px;
        }
        #reschedule .modal-dialog,#cancel .modal-dialog{
            margin: 60px auto;
        }
        .check_out div.animate-box>div.row:last-child{
            padding: 20px 0;
            background-color: #F5F5F5;
            margin: 0;
        }
        .deadline-date{
            font-size: 20px;
            color: #e02900db;
            text-align: center;
            text-decoration: underline;
            margin-top: -20px;
        }

    </style>
</head>
<body>
<div class="container mail-page">
    <!--    header cua mail-->
    <div class="row mail-header">
        <div class="col-4">
            <img src="https://lh3.googleusercontent.com/fife/ABSRlIqb_wJ88OJRvj8tssoFE7mQkxVonPWaEotVvlagmRQNa17EKNVHr4eiTtRHX2dU7gI96BP7_ECz35aIZGMPpMsAWIJkqvXfVfoevVBw8ck7DLfvyO0Evil0YGd9YVVi5OIcyCVPxYLw80bg8gZmKTGx_yERZZTZk3nETv9XBsIA1lQ_SRVjiB6uhvkqapXJBoiRt-qfXTVFdCA7jidEMw0PqOH4b-QfyYSrEP1WkIJ9CE2NeLGHaoxE6zh6PGiKB1NFb9ALbB0qI67lHK9ce0YTVKUT21vr8a682_m1Mwc_8NSIY-g5M4taZcRwBGngZPKkbFQd0TgMALXTDM3XuimPq0s_bilISWMybzI7MC4MBFyotRSCS16R65hf9JjVF5cVCl_oMLy8OIZYaNAKsgD10y5Ivt1AumPoye_Avtf4s1D8qpJ2hOi49nIB6LIVtIpkAQGiMdWeUNhjBHykPrhXbyPLlOqzL_RF8xoF4uvC50ACHEDSHkkc0C_morJiOSvGRBl-ayvchO58wADRnJdUvAOYtFGVpBJ-qE5_vo8ZBUDlupgENL0B38AiXfYiAJG4g-0F3Mb7pl_I7URjrC9M1DrwnO902HxbyBQmdqDnhhel5vzRrJheSe_2ib-NCnO6nSA4puGiF8vC0DUALXx2UhKI-lD_7YcmZ0swoI7OtZEB0aWrmf5jjb56zxUYOT2UwqamMWs-qjT2naGeUTvn59gimTGf_f4=s688-w688-h149-rw" width="200" height="auto"/>
        </div>
        <div class="col-8">
            <h3>BLOCK CONFIRMATION</h3>
        </div>
    </div>
    <div class="row col-12">
        <p class="first-thanks">Thank you for choosing Helvetic Airline to make your travel reservation. You can require your reservation information below.
            To see the latest information about your reservation, visit <a href="#">Helvetic Airline website</a></p>
        <p class="itinerary">YOUR BLOCKED TICKET ITINERARY:</p>
    </div>
    <!--    thong tin khach hang-->
    <div class="row ticket-details">
        <div class="col-8">
            <table>
                <tr>
                    <td>Passenger Name:</td>
                    <td>Mr... -- <b>Seat:</b></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>@@@</td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td>@@@</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <!--            qr code den website-->
            <img src="https://lh3.googleusercontent.com/QTyhEBiJJu1O8fHSCtNMNWoOALoe_36vM2pNN-51G__WgtpsbBeVaSBFKXaZlh5LvXQGeATZ32WSZ-PxbXuID4olOM6tPy87xi-evoNPqiO94fL9hhWk3iv49oXHhQIuONH596_MMElB0IqmvC_ii_b5kl05psX8gzP3CDJSMjWCkSjB1NHAicVsW_Yo7kfuNZmiX2cIy9s-6MIiiyO3jAUUy_2PzvZ-7dqPuFkOjnhri8HvbbztQjdIhHxpw6DuzKJg-PGZ6xotEHpD-Sy1t9NEl3dmeRWq40rgJ9uf1CEdQvMWilnSoaYS5ncO5A4nd9gb3pqH9e4nh1P5uwLHLVZQ0N159cvDrGYi50mozjmCy_JZJJCyHpWyrFZgwghLPKThEiQV51t_6muaqSI_xwTH2quGAHtL_pVd1qZ8VhsAUTwD4CzmHbbz5rnupwIQsX-t6JF9fX86B1A049bVDLrUJeXwhoPsARZUUTbh-Z2sGlS_lwsEZsfuGlR26b5g_yPMIdt898HyhcOjUR4dwer7kKhK79yLSXiA8LW7UjUNiY2w9LWN6nDM23EUt7_TXi6tYkOZ_SaWArETKScnn6Ytq7Q-O4jyEVfqJd7GWYeQOswyizRh71IhyRMI0SCqvFc3Yp72f563p7B9LZaHv-8nLrfDGJt6MIGgOGbGpcKdHkfIWryyJGUtXQUC2FePD9X_Qw-HHCwKNCDzIpHPCxTJ=s200-no?authuser=0" height="60" width="60"/>
            <p>Reservation code: AAAA</p>
        </div>
    </div>
    <p><img src="https://lh3.googleusercontent.com/HDORnlEa6fzHozYGtBSwBnb3sXwLZ5A83ux1VuxqitdG805uge_X_dcHKVIJVF0KKQFipFZ6b6vaE2LHxFnaNWpZ_OPFmLFZArleMhDgD-_sCRRINIe8TeyPYwvDrP6zD-QNOPO4A_LxqRZvdbDrqvtjwp3EmmmAhEkzunU_UO73QG3648nYiY-CoKIOGS21vXmgvfyGdmQNiOQJH0DDQkWN7gmE3hxFi8EWVtj6S1e8DCrwtjMeNy9AUCswdfyiE0nAU-gxvUMgSfVF_7KHHJ_AEX9z9fzGycp4EcFe4tmx1H_wjMkBbHS_vOB90va_iFECWxraCQui7jZq7_q1Q6CC6RfLY6MTL97bhmqoVflnM0XzrPtRgVjBQark978c5b8QwnFrKW7tzBDxc9e4GDvcgvRqLdKe42a0RD5h62eezPCYnqOJvOtSJ0jSU1ZA8tqt-2gf9g7TlzLUgD72MrW3PmODy8v63NGDoLco1U3sJC1G4mx1K8YrSypAn-EJQE1JDasx1gEXCUlVoBevr3kCHPwiitlxPRLrgnYwwkJ2FlS5FBZb4XhPXFvNz4uQOGcdPo_Y8mzZrUixNs54eHs0kEW20COsjRVmLP-bJXPmpe6hVTlEELZBn4BxfLGzGIRX35P3GJH2dyoD6tL0ge70PdJZz4FSrbzm3g_p3wHkuPW_cNl4uhJl8y-KkxS3oGlSfHZ13Zn0ptm4DYQrT8Ei=s84-no?authuser=0" height="30" width="30"/> Departure: <span class="depart-date">November 10th, 2021</span></p>
    <div class="row departure-details">
        <div class="col-4">
            <p>Helvetic Airline</p>
            <p>HV111 - (aircraft)</p>
            <p>Duration: hr(s) min(s)</p>
            <p>Cabin: </p>
        </div>
        <div class="col-8">
            <table>
                <tr>
                    <td>
                        <img src="https://lh3.googleusercontent.com/M6el8SGgFEKhBrET4dJDj0sZPs06JEEbH-wYb7tXKgAjGRbQ3CvdPSL0KVdbUQJGZl97JB9ninaMUSiZD7gHI7RpGkOuKISca3n2-qd6ImgD3d0l0-sGpYEqBscPd8oN4ur8PSdOPlG9XDhsIip6Q0-Qh4fVQ6EA5cY8pd-ljgDfOdEPtgCuWsT3CEqUgpKngStlBPj0yoQ4-ovkw5-tc04VBVqQ59TAvNdEGFn96IlwBvyIsEdj7WJLal6zQRXWovDIriTWcL5_onqC6soTSPa2GE1bKxY4z4Rfle9789X2BssEGbBS2SMIVUNmrs7ZjeDvJRlolN3bnQfJ7cCzPBl6ehNDGaabn8rP4QSqkbKjzMIBwpaZXrZJCBQljKkOtRjlHdS7AN1LOwRGhAb4k2cFpMzG4zO3zUkDaMdJSkGSO5NNQrIwO9z8CUYJSsKic6RObpPB2TbnX_xBdrs_ljLOP_mwha8NDz-7zxf1iStL1u5CaUg8dCy-4VAymTmlsa6fvxRWhenBe6BRLw_WNpi9p9GZx9_hKhxr_BObbe_bG_zPyVbwAwBQV60npqBeMRbzaPo8ffPLBDIBadgE3MD2Tfwx_RIoSLyL4cP_k2_gIByiwUCV2SWwpQQZ3eLk__BYJGG8voi5plsx-xCpYclgKTfhdgpF7ZC4V5pfFI3K6t8V8WnFQeYE6_3zHg0Usy6LctxPnKEscsdLfexaqsBh=s128-no?authuser=0" height="50" width="50"/>
                        <span>HAN</span>
                        <p>Ha Noi, Vietnam</p>
                    </td>
                    <td>
                        <img src="https://lh3.googleusercontent.com/C1FBvbRHFXD-92E61uOSJ2XkUhjsiO0bcLqXRI-nPQDn3TwphhGZ80zqdnTmS_bIufDAqzJKvPJv7jiFFfhc3CainEjIjAIsUneb_GhldGUD4kSwsEhc9oy1Kfnw6LNjtOMQAkxQ2v6ATHHIxwGHaQ64rARKSKvNE9Y5p2VWFNlCEhMtbsFhsypB-cJoEeMIsW1auJxXyIiNnm1dahh_pRkABFoeHOB7IfAic7lJtXTbzgGjHEqW-XNUJuCQRVXuOJ9VWyo2D7PglxbWvK3EBtbh76fQixOVmB3b7k0Chay4UQTb6J6OcdjVjdDYBsQ_Tk0Qm2Xpm1fFtvznt05Kk9IQMZD4mCKoiHZMgglh1sZml7Dm0HK1snhc7doGlmhHdFpLFNUiwtzOUEkpR-1MRFT2EIxV6u7xVl59V9MajZh6tN0ZUiGJjqqfOflL-n2S2om9w823GxXKtO5-M6pUygD9FjzJyQxX7-mpuRa_6K0kOxHBkvwPNCVYw45U2uQxhUMJ15w8XeI6D9GYXN45RoSNmMfPEb8w9A8SWcsAdC-hvisXSG_gzd-7sSzHGim-WL0hzseSczgbX12Gvje2en2N_jb-zyde5WVKRSzn2Q2AryEIVWMFUmf6liEDIEh9n5FKJxnMdheqbQj7R1QKm-rG8I5g_R0or4dVQNHv1lLJx6EAn8QjM8LsYa9lKn5NasXOU8R8N0_kT9CdhS-DT1Wr=s128-no?authuser=0" height="50" width="50"/>
                        <span>HCM</span>
                        <p>Ho Chi Minh, Vietnam</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Departuring at: <span>9:50</span></p>

                    </td>
                    <td>
                        <p>Arriving at: <span>9:50</span></p>
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
    <p>Payment Details</p>
    <div class="row payment-details">
        <table>
            <tr>
                <td colspan="2">Payment Type</td>
                <td>VN Pay</td>
            </tr>
            <tr>
                <td colspan="2">Status</td>
                <td><span>Unpaid</span></td>
            </tr>
            <tr>
                <td colspan="2">Ticket Fare</td>
                <td>VND</td>
            </tr>
            <tr>
                <td rowspan="4">Tax</td>
                <td>Airport Tax Domestic</td>
                <td>VND 1000</td>
            </tr>
            <tr>
                <td>Admin Fee Domestic</td>
                <td>VND 1000</td>
            </tr>
            <tr>
                <td>Airport Security</td>
                <td>VND 1000</td>
            </tr>
            <tr>
                <td>System Admin</td>
                <td>VND 1000</td>
            </tr>
            <tr>
                <td>Seat</td>
                <td>VND 1000</td>
            </tr>
            <tr>
                <td colspan="2">Total</td>
                <td>VND 100000</td>
            </tr>
        </table>

        <p>Purchase deadline: <b>Wednesday, February 27,2021</b></p>

        <a href="#"><button>Select seat and purchase</button></a>

    </div>
    <div class="row mail-note">
        <ul>Note:
            <li>Your ticket has been blocked until 2 weeks before the departure date with no cost</li>
            <li>All the reservations will automatically
                be cancelled if you don's purchase your ticket before the deadline above.</li>
        </ul>
    </div>
    <p class="hotline">Hotline: <a href="tel:19009999">1900-9999</a> (24/7 service).</p>
</div>
</body>
</html>
