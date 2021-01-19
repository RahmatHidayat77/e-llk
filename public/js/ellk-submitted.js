


$(function () {

    // update data 
    $("#m_form_update").on('submit', function (l) {

        l.preventDefault();

        var t = $("#m_submit"),
            r = $(this).closest("form");
        id = $("#idData").val();

        r.validate({
            rules: {
                verify: {
                    required: true,
                },
            }
        }), r.valid() && (r.ajaxSubmit({
            url: "/submited/update/" + id,
            method: "POST",
            dataType: "json",
            success: function (data) {

                swal.fire({
                    type: 'success',
                    title: 'Your Data has been updated',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })
            },
            error: function (request, status, error) {
                console.log(error);
                swal.fire({
                    type: 'error',
                    title: 'Something when wrong',
                    confirmButtonText: 'Ok'
                })
            }
        }))
    });

    // init datatable 
    $('#data_activity').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            },

        ]
    });

    //data update details
    $('body').on('click', '#m_update', function () {
        var id = $(this).attr('data-id');
        var verify = $(this).attr('data-verify');
        var note = $(this).attr('data-catatan');
        const verifyValue = verify == 0 ? 'false' : 'true';

        $('#idData').val(id);
        $('#verified').val(verifyValue);
        $('#catatan').val(note);
    });

});


