$('#jquery-version').html($().jquery);
$('#jquery-version').addClass('ok').removeClass('danger');

setTimeout(function() {
    $('#session-message').fadeOut('slow');
}, 2000); // <-- time in milliseconds

$(document).ready(function() {
    $('.js-select2').select2({
        //theme: "classic",
    });
});