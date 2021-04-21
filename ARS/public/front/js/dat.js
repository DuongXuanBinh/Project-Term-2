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
        $("#datepicker_return").datepicker('option', 'minDate', date );
    },
    onClose: function(){
        $(".overlay_datepicker").removeClass("active");
    },
    minDate: 0,
    maxDate: "+21d",
    dateFormat: "yy-mm-dd",
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
    dateFormat: "yy-mm-dd",
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
        $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('cursor','not-allowed');
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
        var a = $(".flag1").val();
        var b = $(".flag2").val();
        var c = $(".flag3").val();
        var d = $(".flag4").val();
        var e = $(".flag5").val();
        if (this.checked && a == "true" && b == "true" && c == "true" && d == "true" && e == "true"){
            $(".btn_sign_up").removeClass('btn-secondary').addClass('btn-primary').css('pointer-events','all').css('cursor','pointer');
        }
        else{
            $(".btn_sign_up").removeClass('btn-primary').addClass('btn-secondary').css('pointer-events','none');
        }
    }
)
// start Select seats Flight[0]
var id_first = "flight_0";
var id_first_passenger = $("#"+id_first+" .select_seat_passenger:first").attr('id');

var id_second = "flight_1";
var id_second_passenger = $("#"+id_second+" .select_seat_passenger:first").attr('id');

var id_third = "flight_2";
var id_third_passenger = $("#"+id_third+" .select_seat_passenger:first").attr('id');

var id_four = "flight_3";
var id_four_passenger = $("#"+id_four+" .select_seat_passenger:first").attr('id');

function choose_seats(id_first,id_first_passenger ){
    $(".select_seats .tab-content #"+id_first+" .seat-map table tr td div ").on(
        'click',function (){

            if (!$(this).children('img').hasClass("check_seat")){
                var ID = id_first +"_"+id_first_passenger;
                var imgAfter = "<img class=\"check_seat "+ID+"\" src=\"./front/images/icon-premium-seat1.png\" alt=\"\">"
                $(this).children('img').addClass("hide_seat_"+ID);
                $(".check_seat."+ID).remove();
                $(".hide_seat_"+ID).css('display','inline');
                $(this).children('img').css('display','none');
                $(this).append(imgAfter);
                var location_seat = $(this).attr('name');
                $("#"+id_first+" #"+id_first_passenger).find("p").text(location_seat);
                $("#"+id_first+" #"+id_first_passenger).find("input:hidden").attr('value',location_seat);
            }

        })

    $(".select_seats .nav-tabs li."+id_first+"_tab").on(
        'click',function (){
            if (!$("#"+id_first).find(".select_seat_passenger").hasClass("active_passenger")){
                id_first_passenger = $("#"+id_first+" .select_seat_passenger").attr('id');
                $("#"+id_first+" #"+id_first_passenger).addClass('active_passenger');
            }
        }
    )
    $("#"+id_first+" #"+id_first_passenger).addClass('active_passenger');

    $("#"+id_first+" .select_seat_passenger").on(
        'click',function (){
            id_first_passenger = $(this).attr('id');
            $("#"+id_first+" .select_seat_passenger").removeClass('active_passenger');
            $(this).addClass('active_passenger');
        }
    )

}

choose_seats(id_first,id_first_passenger);
choose_seats(id_second,id_second_passenger);
choose_seats(id_third,id_third_passenger);
choose_seats(id_four,id_four_passenger);

//end select seat Out-Bound


$(".check_out form input:radio").on(
    'change',function () {
        if (this.checked){
            $(".radio_choose").removeClass("radio_choose_active");
            $(this).parents(".radio_choose").addClass("radio_choose_active");
        }
    }
);

//Search Place

// $(document).ready(function (){
//
//     //place from
//     $('#place_from').keyup(function (){
//         var query = $(this).val();
//         if (query !== ''){
//             var _token = $('input[name="_token"]').val();
//             $.ajax({
//                 type: "GET",
//                 url: "booking/search",
//                 data: {query:query, _token:_token},
//                 success:function (data){
//                     $('#place_from_list').fadeIn();
//                     $('#place_from_list').html(data);
//                     $(document).click(function() {
//                         if( this.id !== 'place_from_list') {
//                             $("#place_from_list").fadeOut();
//                         }
//                     });
//                 }
//
//             });
//
//         }
//     });
//     $("#place_from_list").on('click','li',function (){
//         $("#place_from").val($(this).text());
//         $("#place_from_list").fadeOut();
//     });
//
//     //place to
//     $('#place_to').keyup(function (){
//         var query = $(this).val();
//         if (query !== ''){
//             var _token = $('input[name="_token"]').val();
//             $.ajax({
//                 type: "GET",
//                 url: "booking/search",
//                 data: {query:query, _token:_token},
//                 success:function (data){
//                     $('#place_to_list').fadeIn();
//                     $('#place_to_list').html(data);
//                     $(document).click(function() {
//                         if( this.id !== 'place_from_list') {
//                             $("#place_to_list").fadeOut();
//                         }
//                     });
//                 }
//             });
//         }
//     });
//     $("#place_to_list").on('click','li',function (){
//         $("#place_to").val($(this).text());
//         $("#place_to_list").fadeOut();
//     });
//     $('.form-signup svg').css('display','none');
//
// });

//validate sum passenger
var max = 3;
var $inputs = $('form .passenger_div input[type="number"]');

function sumInputs($inputs) {
    var sum = 0;

    $inputs.each(function() {
        sum += parseInt($(this).val(), 0);
    });

    return sum;
}

$inputs.on('input', function(e) {
    var $this = $(this);
    var sum = sumInputs($inputs.not(function(i, el) {
        return el === e.target;
    }));
    var value = parseInt($this.val(), 10) || 0;
    if(sum + value > max) $this.val(max - sum);
    $inputs.on('change',change_btn_sum_passenger(sum+value))

});

function change_btn_sum_passenger(sum){
    if (sum === 1 ){
        $('.dropdown .btn_sum_passenger').text(sum + " Passenger")
    }
    if (sum === 2 || sum === 3  ) {
        $('.dropdown .btn_sum_passenger').text(sum + " Passengers")
    }
    else {
        $('.dropdown .btn_sum_passenger').text(3 + " Passengers")
    }
}

//display travel class in #travel_dropdown

$('input[name="travel_class"]').on(
    'change',function (){
        var value = $('input[name="travel_class"]:checked').val();
        if (value == 1){
            $('#travel_dropdown').text('Economy Class')
        }
        if (value == 2){
            $('#travel_dropdown').text('Business Class')
        }
    }
);


$('.btn_other_outbound div button.date-button').on('click',function (){
    var other_outbound =  $(this).siblings('input[name="other_day_outbound"]').val();

    $.ajax({
        type: "GET",
        url: "booking/other_date",
        data: {other_outbound: other_outbound},
        success: function (data){
            $('.outbound_flights').empty();
            $('.outbound_flights').html(data);
        },
        error: function (error){
            alert('failed');
            console.log(error);
        }
    })
});



$('.btn_other_return div button.date-button').on('click',function (){
    var other_return =  $(this).siblings('input[name="other_day_return"]').val();
    $.ajax({
        type: "GET",
        url: "booking/other_date",
        data: {other_return: other_return},
        success: function (data){
            $('.return_flights').empty();
            $('.return_flights').html(data);
        },
        error: function (error){
            alert('failed');
            console.log(error);
        }
    })
});


$('.btn_other_outbound_transit div button.date-button').on('click',function (){
    var other_outbound_transit =  $(this).siblings('input[name="other_day_outbound"]').val();
    $.ajax({
        type: "GET",
        url: "booking/other_date",
        data: {other_outbound_transit: other_outbound_transit},
        success: function (data){
            $('.outbound_flights').empty();
            $('.outbound_flights').html(data);
        },
        error: function (error){
            alert('failed');
            console.log(error);
        }
    })
});

$('.btn_other_return_transit div button.date-button').on('click',function (){
    var other_return_transit =  $(this).siblings('input[name="other_day_return"]').val();
    $.ajax({
        type: "GET",
        url: "booking/other_date",
        data: {other_return_transit: other_return_transit},
        success: function (data){
            $('.return_flights').empty();
            $('.return_flights').html(data);
        },
        error: function (error){
            alert('failed');
            console.log(error);
        }
    })
});

$(document).ready(function (){
    $('#notification').modal('hide')
});


$('#btn_check_sign_in').on('click',function (e){
    e.preventDefault();
});

$('#select_flight_sign_in').on('click',function (){
    $('#form_choose_flight').submit();
});


$.ajaxSetup({ headers: { csrftoken : '{{ csrf_token() }}' } });

$( document ).ajaxStop(function() {

    $(".flight-detail").on('click',function (){
        $(this).find('input:radio').prop('checked',true);
    });

});



// Show available seats




$(document).ready(function (){


    for (var i = 0; i < $('#flight_0 input[name="seat_location"]').length; i++){
        var seat_unavailable = $('#flight_0 input[name="seat_location"]')[i].value;
        $('#flight_0').find('div[name='+seat_unavailable+']').children('img').attr("src","front/images/icon-unavailable-seat.png");
        $('#flight_0').find('div[name='+seat_unavailable+']').css('pointer-events','none');

    }
    for (var i = 0; i < $('#flight_1 input[name="seat_location"]').length; i++){
        var seat_unavailable = $('#flight_1 input[name="seat_location"]')[i].value;
        $('#flight_1').find('div[name='+seat_unavailable+']').children('img').attr("src","front/images/icon-unavailable-seat.png");
        $('#flight_1').find('div[name='+seat_unavailable+']').css('pointer-events','none');
    }
    for (var i = 0; i < $('#flight_2 input[name="seat_location"]').length; i++){
        var seat_unavailable = $('#flight_2 input[name="seat_location"]')[i].value;
        $('#flight_2').find('div[name='+seat_unavailable+']').children('img').attr("src","front/images/icon-unavailable-seat.png");
        $('#flight_2').find('div[name='+seat_unavailable+']').css('pointer-events','none');
    }
    for (var i = 0; i < $('#flight_3 input[name="seat_location"]').length; i++){
        var seat_unavailable = $('#flight_3 input[name="seat_location"]')[i].value;
        $('#flight_3').find('div[name='+seat_unavailable+']').children('img').attr("src","front/images/icon-unavailable-seat.png");
        $('#flight_3').find('div[name='+seat_unavailable+']').css('pointer-events','none');
    }
});

// radio choose how to checkout

$(".radio_choose").on('click',function (){
    $(this).find('input:radio').prop('checked',true);
    $('.radio_choose').removeClass('radio_choose_active');
    $(this).addClass('radio_choose_active');
});



