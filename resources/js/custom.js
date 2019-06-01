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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#customFile").change(function(){
    readURL(this);
});