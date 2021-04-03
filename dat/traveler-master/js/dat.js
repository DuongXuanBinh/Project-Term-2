//selected các input để hiển thị màu
$(function () {
    $('.booking-form').click(function(){

            $('.booking-form').removeClass('selected');
            $(this).addClass('selected');
    })
});
// input outbound day
var todate = new Date(),
    today  = todate.getDate(),
    tomonth = todate.getMonth() ,
    year =  todate.getFullYear();
(function ($){

    $(window).on('load', function () {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        $('.outbound_day').text(today);
        $('.outbound_month').text(monthNames[tomonth]);
    });

})(jQuery);
// function show_date_picker(){
    $( "#datepicker_outbound" ).datepicker({
        onSelect: function(dateText) {
            var date = $(this).datepicker('getDate'),
                day  = date.getDate(),
                month = date.getMonth() ,
                year =  date.getFullYear();
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            $('#datepicker_outbound').val(dateText);
            $(' .outbound_day').text(day);
            $('.outbound_month').text(monthNames[month]);
            // $( "#datepicker" ).datepicker( "destroy");
            // $( "#datepicker" ).datepicker("hide");
            $(".overlay_datepicker").removeClass("active");
        },
        onClose: function(){
            $(".overlay_datepicker").removeClass("active");
        },
        minDate: 0,
        maxDate: "+21d",
    });
// }
$("#from-outbound-date").click(function () {
    $(".overlay_datepicker").addClass("active");
    $( "#datepicker_outbound" ).datepicker("show");
    // show_date_picker();
});
$(".overlay_datepicker").on(
    'click',function () {
        // $( "#datepicker" ).datepicker( "destroy" );
        $( "#datepicker_outbound" ).datepicker("hide");
        $(".overlay_datepicker").removeClass("active");
    }
);
// input add day return
$( "#datepicker_return" ).datepicker({
    onSelect: function(dateText) {
        var date = $(this).datepicker('getDate'),
            day  = date.getDate(),
            month = date.getMonth() ,
            year =  date.getFullYear();
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        $('#datepicker_return').val(dateText);
        $(' .return_day').text(day);
        $('.return_month').text(monthNames[month]);
        $(".overlay_datepicker").removeClass("active");
        $(".close_return_date_btn").css("display","block");
    },
    onClose: function(){
        $(".overlay_datepicker").removeClass("active");
        if (!( $(' .return_day').text() === "")){
            $("#add-return-date").css("display","none");
            $(".display_return_date").css("display","block");

        }

    },
    minDate: 0,
    maxDate: "+21d",
});
// }
$("#add-return-date").click(function () {
    $(".overlay_datepicker").addClass("active");
    $( "#datepicker_return" ).datepicker("show");
    // show_date_picker();
});
$(".display_return_date").click(function () {
    $(".overlay_datepicker").addClass("active");
    $( "#datepicker_return" ).datepicker("show");
});
$(".overlay_datepicker").on(
    'click',function () {
        // $( "#datepicker" ).datepicker( "destroy" );
        $( "#datepicker_return" ).datepicker("hide");
        $(".overlay_datepicker").removeClass("active");
        $(".class_radio_div").css('display','none');
    }
);
$(".close_return_date_btn").click(function () {
    $( "#datepicker_return" ).datepicker("hide");
    $(".display_return_date").css("display","none");
    $(this).css("display","none");
    $("#add-return-date").css("display","block");
});

$('#passenger_dropdown').on('shown.bs.dropdown', function () {
    $(".overlay_datepicker").addClass("active");
})
$('#passenger_dropdown').on('hidden.bs.dropdown', function () {
    $(".overlay_datepicker").removeClass("active");
});
$("#travel_dropdown").click(function () {
    $(".overlay_datepicker").addClass("active");
    $(".class_radio_div").css('display','block');
});
$(".confirm_div").click(function () {
    $(".overlay_datepicker").removeClass("active");
    $(".class_radio_div").css('display','none');
});
$(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 3,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true
    });

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".profile_form .form input").prop( "readonly", true );
    $(".profile_form .save,.cancel").css('display','none');

    if (!$(".form-signup input:checkbox").is(':checked')){
        $(".btn_sign_up").prop('disabled', true);
    }



})

$(".profile_form .edit").on(
    'click',function () {
        $(this).css('display','none');
        $(".profile_form .form input").prop( "readonly", false );
        $(".profile_form .save,.cancel").css('display','inline');
    }
)
$(".profile_form .cancel").on(
    'click',function () {
        $(".profile_form .edit").css('display','block');
        $(".profile_form .form input").prop( "readonly", true );
        $(".profile_form .save,.cancel").css('display','none');
    }
)
$(".dp_sign_up").on(
    'click',function () {
        $(".sign_up").css('display','block');
        $('html,body').animate({
                scrollTop: $(".sign_up").offset().top},
            'slow');
    }
)
$(".form-signup input:checkbox").on(
    'change',function () {
        if (this.checked){
            $(".btn_sign_up").prop('disabled', false);
        }
        if (!this.checked){
            $(".btn_sign_up").prop('disabled', true);
        }
    }
)

$(".select_seats .tab-content .seat-map table tr td div ").on(
        'click',function (){
            if (!$(this).children('img').hasClass("check_seat")){
                var imgAfter = "<img class=\"check_seat "+idPassenger+"\" src=\"images/icon-premium-seat1.png\" alt=\"\">"
                $(this).children('img').addClass("hide_seat_"+idPassenger);
                $(".check_seat."+idPassenger).remove();
                $(".hide_seat_"+idPassenger).css('display','inline');
                $(this).children('img').css('display','none');
                $(this).append(imgAfter);
                var location_seat = $(this).attr('name');
                $("#"+idPassenger).find("p").text(location_seat);
            }

        })
var idPassenger = $(".select_seat_passenger:first").attr('id');
$("#"+idPassenger).addClass('active_passenger');
var countPassenger = $("#out_bound .select_seat_passenger").length;

$(".select_seat_passenger").on(
    'click',function (){
        idPassenger = $(this).attr('id');
        $(".select_seat_passenger").removeClass('active_passenger');
        $(this).addClass('active_passenger');
    }
)
$(function() {
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(e.target).closest('form'),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;

        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault(); // cancel on first error
            }
        });
    });
});

$(".check_out form input:radio").on(
    'change',function () {
        if (this.checked){
            $(".radio_choose").removeClass("radio_choose_active");
            $(this).parents(".radio_choose").addClass("radio_choose_active");
        }
    }
);


