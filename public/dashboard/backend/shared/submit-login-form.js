$(document).ready(function(){

    $(document).on('submit', '.submit-form', function (e) {
        e.preventDefault();
        $(document).find('.error').html("");
        $(document).find('.error').hide();

        var formData = new FormData($(this)[0]),
            action = $(this).attr('action'),
            method = $(this).attr('method');
        // make the ajax request
        $.ajax({
            url: action,
            type: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if(response.status == 1){
                    Swal.fire({
                        title: "Logged in successfully",
                        type: 'success',
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false,
                    });

                    console.log( response.redirect);
                    window.location.href = response.redirect;
                }
                else{
                    Swal.fire({
                        title: "Loggin failed",
                        type: 'error',
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                }

                // check for reload
                if(response.reload && response.reload == 1){
                    setTimeout(function (){
                        location.reload();
                    }, 1500);
                }

            },
            error: function (errors) {
                console.log(errors);
                for (var k in errors.responseJSON.errors) {
                    $(document).find('.error-'+k).show();
                    $(document).find('.error-'+k).html(errors.responseJSON.errors[k]);
                }
            }
        });


    });

});