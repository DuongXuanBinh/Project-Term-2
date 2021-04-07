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
//start Select seats Out-Bound

$(".select_seats .tab-content #out_bound .seat-map table tr td div ").on(
        'click',function (){

            if (!$(this).children('img').hasClass("check_seat")){
                var ID = id_outbound +"_"+id_out_passenger;
                var imgAfter = "<img class=\"check_seat "+ID+"\" src=\"images/icon-premium-seat1.png\" alt=\"\">"
                $(this).children('img').addClass("hide_seat_"+ID);
                $(".check_seat."+ID).remove();
                $(".hide_seat_"+ID).css('display','inline');
                $(this).children('img').css('display','none');
                $(this).append(imgAfter);
                var location_seat = $(this).attr('name');
                $("#"+id_outbound+" #"+id_out_passenger).find("p").text(location_seat);
                $("#"+id_outbound+" #"+id_out_passenger).find("input:text").attr('value',location_seat);
            }

        })
var id_outbound = "out_bound"

$(".select_seats .nav-tabs li.out_bound_tab").on(
    'click',function (){
        if (!$("#"+id_outbound).find(".select_seat_passenger").hasClass("active_passenger")){
            id_out_passenger = $("#"+id_outbound+" .select_seat_passenger").attr('id');
            $("#"+id_outbound+" #"+id_out_passenger).addClass('active_passenger');
        }
    }
)
var id_out_passenger = $("#"+id_outbound+" .select_seat_passenger:first").attr('id');
$("#"+id_outbound+" #"+id_out_passenger).addClass('active_passenger');

$("#out_bound .select_seat_passenger").on(
    'click',function (){
        id_out_passenger = $(this).attr('id');
        $("#"+id_outbound+" .select_seat_passenger").removeClass('active_passenger');
        $(this).addClass('active_passenger');
    }
)

//end select seat Out-Bound

//start select seat In-bound
$(".select_seats .tab-content #in_bound .seat-map table tr td div ").on(
    'click',function (){

        if (!$(this).children('img').hasClass("check_seat")){
            var ID = id_inbound +"_"+id_in_passenger;
            var imgAfter = "<img class=\"check_seat "+ID+"\" src=\"images/icon-premium-seat1.png\" alt=\"\">"
            $(this).children('img').addClass("hide_seat_"+ID);
            $(".check_seat."+ID).remove();
            $(".hide_seat_"+ID).css('display','inline');
            $(this).children('img').css('display','none');
            $(this).append(imgAfter);
            var location_seat = $(this).attr('name');
            $("#"+id_inbound+" #"+id_in_passenger).find("p").text(location_seat);
        }

    })
var id_inbound = "in_bound"

$(".select_seats .nav-tabs li.in_bound_tab").on(
    'click',function (){
        if (!$("#"+id_inbound).find(".select_seat_passenger").hasClass("active_passenger")){
            id_in_passenger = $("#"+id_inbound+" .select_seat_passenger").attr('id');
            $("#"+id_inbound+" #"+id_in_passenger).addClass('active_passenger');
        }
    }
)
var id_in_passenger = $("#"+id_inbound+" .select_seat_passenger:first").attr('id');
$("#"+id_inbound+" #"+id_in_passenger).addClass('active_passenger');


$("#in_bound .select_seat_passenger").on(
    'click',function (){
        id_in_passenger = $(this).attr('id');
        $("#"+id_inbound+" .select_seat_passenger").removeClass('active_passenger');
        $(this).addClass('active_passenger');
    }
)

//end select seat In-Bound

$(".check_out form input:radio").on(
    'change',function () {
        if (this.checked){
            $(".radio_choose").removeClass("radio_choose_active");
            $(this).parents(".radio_choose").addClass("radio_choose_active");
        }
    }
);

//Search Place

$(document).ready(function (){

    //place from
    $('#place_from').keyup(function (){
        var query = $(this).val();
        if (query !== ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "GET",
                url: "booking/search",
                data: {query:query, _token:_token},
                success:function (data){
                    $('#place_from_list').fadeIn();
                    $('#place_from_list').html(data);
                    $(document).click(function() {
                        if( this.id !== 'place_from_list') {
                            $("#place_from_list").fadeOut();
                        }
                    });
                }

            });

        }
    });
    $("#place_from_list").on('click','li',function (){
        $("#place_from").val($(this).text());
        $("#place_from_list").fadeOut();
    });

    //place to
    $('#place_to').keyup(function (){
        var query = $(this).val();
        if (query !== ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "GET",
                url: "booking/search",
                data: {query:query, _token:_token},
                success:function (data){
                    $('#place_to_list').fadeIn();
                    $('#place_to_list').html(data);
                    $(document).click(function() {
                        if( this.id !== 'place_from_list') {
                            $("#place_to_list").fadeOut();
                        }
                    });
                }
            });
        }
    });
    $("#place_to_list").on('click','li',function (){
        $("#place_to").val($(this).text());
        $("#place_to_list").fadeOut();
    });
});

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
)
