$(document).ready(function() {
    $('body').on('click', '.btndelete_chk', function () {
        $this = $(this);

        swal({
            title: "Are you sure?",
            // text: "You will not be able to recover !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
        }, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: 'DELETE',
                url:  '/'+ $this.data('route')+'/' + $this.data('model') + '/' + $this.data('id'),
                success: function () {

                    swal("Deleted!", "Your record has been deleted.", "success");
                    $('#datatable-buttons').DataTable().ajax.reload();
                },
                error: function (jqXhr) {
                    swal('Error!',jqXhr,'error');
                }
            });
        });
    });
});
