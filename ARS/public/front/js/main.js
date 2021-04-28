;(function () {

	'use strict';

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#gtco-offcanvas, .js-gtco-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	    	$('.js-gtco-nav-toggle').addClass('gtco-nav-white');

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-gtco-nav-toggle').removeClass('active');

	    	}
	    }
		});

	};

	var formTab = function() {

		$('.tab-menu a').on('click', function(event){
			var $this = $(this),
				data = $this.data('tab');

			$('.tab-menu li').removeClass('active');
			$this.closest('li').addClass('active')

			$('.tab .tab-content-inner').removeClass('active');
			$this.closest('.tab').find('.tab-content-inner[data-content="'+data+'"]').addClass('active');

			event.preventDefault();

		});

	};

	var offcanvasMenu = function() {

		$('#page').prepend('<div id="gtco-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-gtco-nav-toggle gtco-nav-toggle gtco-nav-white"><i></i></a>');
		var clone1 = $('.menu-1 > ul').clone();
		$('#gtco-offcanvas').append(clone1);
		var clone2 = $('.menu-2 > ul').clone();
		$('#gtco-offcanvas').append(clone2);

		$('#gtco-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#gtco-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-gtco-nav-toggle').removeClass('active');

	    	}
		});
	};


	var burgerMenu = function() {

		$('body').on('click', '.js-gtco-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};



	var contentWayPoint = function() {
		var i = 0;

		// $('.gtco-section').waypoint( function( direction ) {


			$('.animate-box').waypoint( function( direction ) {

				if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {

					i++;

					$(this.element).addClass('item-animate');
					setTimeout(function(){

						$('body .animate-box.item-animate').each(function(k){
							var el = $(this);
							setTimeout( function () {
								var effect = el.data('animate-effect');
								if ( effect === 'fadeIn') {
									el.addClass('fadeIn animated-fast');
								} else if ( effect === 'fadeInLeft') {
									el.addClass('fadeInLeft animated-fast');
								} else if ( effect === 'fadeInRight') {
									el.addClass('fadeInRight animated-fast');
								} else {
									el.addClass('fadeInUp animated-fast');
								}

								el.removeClass('item-animate');
							},  k * 200, 'easeInOutExpo' );
						});

					}, 100);

				}

			} , { offset: '85%' } );
		// }, { offset: '90%'} );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var owlCarousel = function(){

		var owl = $('.owl-carousel-carousel');
		owl.owlCarousel({
			items: 3,
			loop: true,
			margin: 20,
			nav: true,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
			navText: [
		      "<i class='ti-arrow-left owl-direction'></i>",
		      "<i class='ti-arrow-right owl-direction'></i>"
	     	],
	     	responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	    	}
		});


		var owl = $('.owl-carousel-fullwidth');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 20,
			nav: true,
			dots: true,
			smartSpeed: 800,
			autoHeight: true,
			navText: [
		      "<i class='ti-arrow-left owl-direction'></i>",
		      "<i class='ti-arrow-right owl-direction'></i>"
	     	]
		});




	};



	var goToTop = function() {

		$('.js-gotop').on('click', function(event){

			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');

			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});

	};


	// Loading page
	var loaderPage = function() {
		$(".gtco-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	var counterWayPoint = function() {
		if ($('#gtco-counter').length > 0 ) {
			$('#gtco-counter').waypoint( function( direction ) {

				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};


	var dateForm = function() {
		$('#date-start').datepicker();
	};

	var parallax = function() {
		$(window).stellar({
			horizontalScrolling: false,
			hideDistantElements: false,
			responsive: true

		});
	};



	$(function(){
		mobileMenuOutsideClick();
		formTab();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		dropdown();
		owlCarousel();
		goToTop();
		loaderPage();
		counterWayPoint();
		dateForm();
		parallax();
	});


}());

$("#date-flight").datepicker({
	todayHighlight:true,
});
$("#new-arrival-date").datepicker({
    todayHighlight:true,
    minDate:0,
    maxDate:"+21d",
});
$("#new-depart-date" ).datepicker({
    onSelect: function(dateText) {
        var date = $(this).datepicker('getDate');
        $("#new-arrival-date").datepicker('option', 'minDate', date );
    },
    minDate: 0,
    maxDate: "+21d",
});
$("div.group1 button.date-button").click(function (){

	$("div.group1 button.date-button").removeClass('active');
	$(this).addClass('active');
});
$("div.group2 button.date-button").click(function (){

	$("div.group2 button.date-button").removeClass('active');
	$(this).addClass('active');
});
$(".flight-detail").on('click',function (){
	$(this).children('div').children('input').prop('checked',true);
});
$(window).on('load', function() {
    $('#notification').modal('show');
    $('#reset').modal('show');
    // $('#cancel-flight').modal('show');
});
// ------------

$(document).ready(function () {

    $("#code").blur(function (){
       var code = $(this).val();
       var veri_code = $("#veri_code").val();
       if (code!==veri_code){
           $(this).next().empty();
           $(this).next().after("<td style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Code doesn't match</td></tr>");
           $("#reset-password").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
       }else{
           $(this).next().empty();
           $("#reset-password").after("<input type='hidden' class='flag7' value='true'>");
       }
    });
    $("#cf_newpass").keyup(function (){
        var cfpass = $(this).val();
        var pass = $("#new_pass").val();
        if (cfpass!==pass){
            $(this).next().empty();
            $(this).next().after("<td style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Password doesn't match</td></tr>");
            $("#reset-password").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }else{
            var a = $("input.flag7").val()
            if(a=='true'){
                $(this).next().empty();
                $("#reset-password").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
            }
        }
    });
    $("#forgot_email").keyup(function (){
        var query = $(this).val();
        if (query !== '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "get",
                url: "/sign-in/forgot/check",
                data: {query: query, _token: _token},
                success: function (data) {
                    if (!$.trim(data)){
                        $("#forgot_email").nextUntil("#p1").empty();
                        $("#forgot_email").after("<p style='margin: 5px 0 10px; color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Email doesn't exist</p>");
                        $("#submit_email").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                    }else{
                        $("#forgot_email").nextUntil("#p1").empty();
                        $("#submit_email").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
                    }
                }
            })
        }
    });
    $("#su-phonenumber").on('blur', function () {
        var query = $(this).val();
        var name = $(this).attr('name');
        var phonereg = /^(0)[0-9]{9}$/;
        var phone = $(this).val();
        if (!phonereg.test(phone)) {
            $("svg.su-phonenumber").css('display', 'none');
            $("#su-phonenumber").css('border-color', 'red');
            $("label.su-phonenumber").next().next().empty();
            $("label.su-phonenumber").next().empty();
            $("label.su-phonenumber").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Invalid phone number</span>");
            $("label.su-phonenumber").after("<input type='hidden' class='flag1' value='false'>");
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }else {
            if (query !== '' && name !== '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "get",
                    url: "/sign-in/register/check",
                    data: {query: query, name: name, _token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            $("svg.su-phonenumber").css('display', 'inline');
                            $("#su-phonenumber").css('border-color', '#0000001a');
                            $("label.su-phonenumber").next().next().empty();
                            $("label.su-phonenumber").next().empty();
                            $("label.su-phonenumber").after("<span style='color: #0ac5a9;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;You can use this number</span>");
                            $("label.su-phonenumber").after("<input type='hidden' class='flag1' value='true'>");
                            var a = $(".flag1").val();
                            var b = $(".flag2").val();
                            var c = $(".flag3").val();
                            var d = $(".flag4").val();
                            var e = $(".flag5").val();
                            if (a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
                                $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
                            }
                            else{
                                $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                            }
                        } else {
                            $("svg.su-phonenumber").css('display', 'none');
                            $("#su-phonenumber").css('border-color', 'red');
                            $("label.su-phonenumber").next().next().empty();
                            $("label.su-phonenumber").next().empty();
                            $("label.su-phonenumber").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;This number is already exist</span>");
                            $("label.su-phonenumber").after("<input type='hidden' class='flag1' value='false'>");
                            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                        }
                    }
                })
            }
        }
    })
    $("#su-creditcard").on('blur', function () {
        var query = $(this).val();
        var name = $(this).attr('name');
        var creditreg = /^[0-9]{10}$/;
        var credit = $(this).val();
        if (!creditreg.test(credit)) {
            $("svg.su-creditcard").css('display', 'none');
            $("#su-creditcard").css('border-color', 'red');
            $("label.su-creditcard").next().next().empty();
            $("label.su-creditcard").next().empty();
            $("label.su-creditcard").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Invalid credit number</span>");
            $("label.su-creditcard").after("<input type='hidden' class='flag2' value='false'>");
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }else {
            if (query !== '' && name !== '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "get",
                    url: "/sign-in/register/check",
                    data: {query: query, name: name, _token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            $("svg.su-creditcard").css('display', 'inline');
                            $("#su-creditcard").css('border-color', '#0000001a');
                            $("label.su-creditcard").next().next().empty();
                            $("label.su-creditcard").next().empty();
                            $("label.su-creditcard").after("<span style='color: #0ac5a9;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;You can use this credit</span>");
                            $("label.su-creditcard").after("<input type='hidden' class='flag2' value='true'>");
                            var a = $(".flag1").val();
                            var b = $(".flag2").val();
                            var c = $(".flag3").val();
                            var d = $(".flag4").val();
                            var e = $(".flag5").val();
                            if (a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
                                $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
                            }
                            else{
                                $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                            }
                        } else {
                            $("svg.su-creditcard").css('display', 'none');
                            $("#su-creditcard").css('border-color', 'red');
                            $("label.su-creditcard").next().next().empty();
                            $("label.su-creditcard").next().empty();
                            $("label.su-creditcard").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;This credit is already exist</span>");
                            $("label.su-creditcard").after("<input type='hidden' class='flag2' value='false'>");
                            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                        }
                    }
                })
            }
        }
    })
    $("#su-email").on('blur', function () {
        var query = $(this).val();
        var name = $(this).attr('name');
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $(this).val();
        if (!emailReg.test(email)) {
            $("svg.su-email").css('display', 'none');
            $("#su-email").css('border-color', 'red');
            $("label.su-email").next().next().empty();
            $("label.su-email").next().empty();
            $("label.su-email").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Invalid email address</span>");
            $("label.su-email").after("<input type='hidden' class='flag3' value='false'>");
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }else {
            if (query !== '' && name !== '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "get",
                    url: "/sign-in/register/check",
                    data: {query: query, name: name, _token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            $("svg.su-email").css('display', 'inline');
                            $("#su-email").css('border-color', '#0000001a');
                            $("label.su-email").next().next().empty();
                            $("label.su-email").next().empty();
                            $("label.su-email").after("<span style='color: #0ac5a9;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;You can use this email</span>");
                            $("label.su-email").after("<input type='hidden' class='flag3' value='true'>");
                            var a = $(".flag1").val();
                            var b = $(".flag2").val();
                            var c = $(".flag3").val();
                            var d = $(".flag4").val();
                            var e = $(".flag5").val();
                            if (a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
                                $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
                            }
                            else{
                                $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                            }
                        } else {
                            $("svg.su-email").css('display', 'none');
                            $("#su-email").css('border-color', 'red');
                            $("label.su-email").next().next().empty();
                            $("label.su-email").next().empty();
                            $("label.su-email").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;This email is already exist</span>");
                            $("label.su-email").after("<input type='hidden' class='flag3' value='false'>");
                            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
                        }
                    }
                })
            }
        }
    })
    $("#su-password").on('blur', function () {
        var passReg = /^[A-Za-z0-9]{6,}$/;
        var pass = $(this).val();
        if (!passReg.test(pass)) {
            $("svg.su-password").css('display', 'none');
            $("#su-password").css('border-color', 'red');
            $("label.su-password").next().empty();
            $("label.su-password").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Invalid password</span>");
            $(this).after("<input type='hidden' class='flag5' value='false'>");
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        } else {
            $("svg.su-password").css('display', 'inline');
            $("#su-password").css('border-color', '#0000001a');
            $("label.su-password").next().empty();
            $(this).after("<input type='hidden' class='flag5' value='true'>");
            var a = $(".flag1").val();
            var b = $(".flag2").val();
            var c = $(".flag3").val();
            var d = $(".flag4").val();
            var e = $(".flag5").val();
            if (a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
                $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
            }
            else{
                $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
            }
        }
    })
    $("#su-password1").on('blur',function(){
        var pass1 = $("#su-password").val();
        var pass2 = $(this).val();
        if (pass1 === pass2){
            $("svg.su-password1").css('display', 'inline');
            $("#su-password1").css('border-color', '#0000001a');
            $("label.su-password1").next().empty();
            $(this).after("<input type='hidden' class='flag4' value='true'>");
            var a = $(".flag1").val();
            var b = $(".flag2").val();
            var c = $(".flag3").val();
            var d = $(".flag4").val();
            var e = $(".flag5").val();
            if (a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
                $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
            }
            else{
                $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
            }
        }
        else {
            $("svg.su-password1").css('display', 'none');
            $("#su-password1").css('border-color', 'red');
            $("label.su-password1").next().empty();
            $("label.su-password1").after("<span style='color: red;font-style: italic;font-size: 0.8em'>&nbsp;&nbsp;&nbsp;Password doesn't match</span>");
            $(this).after("<input type='hidden' class='flag4' value='false'>");
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }
    })

});

