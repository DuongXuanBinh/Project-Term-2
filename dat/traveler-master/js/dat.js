$(function () {
    $('.booking-form').click(function(){

            $('.booking-form').removeClass('selected');
            $(this).addClass('selected');
    })
});
$(function() {
    $.datepicker.setDefaults({
        showOn: "both",
        buttonImageOnly: true,
        buttonImage: "calendar.gif",
        buttonText: "Calendar"
    });

    $("#from-outbound-date").click(function(){ $(this).datepicker.setDefaults({
        showOn: "both",
        buttonImageOnly: true,
        buttonImage: "calendar.gif",
        buttonText: "Calendar"
    }); });

});