$(document).ready(function(){

    $(document).on('click', '.remove-table', function(e) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure you want to delete this item?',
            icon: 'question',
            html: '',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: $(this).data('action'),
                    type: "POST",
                    dataType: 'html',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        _method: "delete"
                    },
                    success: function(data) {
                        data = JSON.parse(data);

                        if (data.data == 1) {
                            swalWithBootstrapButtons.fire({
                                type: 'success',
                                title: 'Item deleted successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else if (data.data == 2) {
                            swalWithBootstrapButtons.fire({
                                type: 'error',
                                title: 'You do not have permissions for this action',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (data.data == 0) {
                            swalWithBootstrapButtons.fire({
                                type: 'error',
                                title: 'An error has occure, please try again later',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }
                    }
                });

                $(this).closest('tr').remove();
                $(this).closest('.col-md-4').remove();
                $(this).closest('.col-lg-4').remove();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });

    });
});