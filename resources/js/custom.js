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

$(document).ready(function(){  
    var i=1;  

    $('#add').click(function(){  
        
        i++;  

        $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="article_list[]" id="article_list" class="form-control component" style="width:100%;"></select></td><td><input type="text" name="qta[]" placeholder="Quantità" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

        $('.component:last').select2({
            placeholder: "Cerca un articolo ...",
            minimumInputLength: 2,
            ajax: {
                url: '/ajax/find',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });  

    $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove();  
    });  
    
});  

$('.component').select2({
    placeholder: "Cerca un articolo ...",
    minimumInputLength: 2,
    ajax: {
        url: '/ajax/find',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
});
