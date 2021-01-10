


$(function () {

    // add data 
    $("#m_form_create").on('submit', function (l) {

        l.preventDefault();

        var t = $("#m_submit"),
            r = $(this).closest("form");

        r.validate({
            rules: {
                from: {
                    required: true,
                },
                to: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
                kegiatan: {
                    required: true,
                }
            }
        }), r.valid() && (r.ajaxSubmit({
            url: "/ellk/add",
            method: "POST",
            dataType: "json",
            success: function (data) {
                $("#m_form_create")[0].reset();
                swal.fire({
                    type: 'success',
                    title: 'Your Data has been saved',
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

    // update data 
    $("#m_form_update").on('submit', function (l) {

        l.preventDefault();

        var t = $("#m_submit"),
            r = $(this).closest("form");
            id = $("#idData").val();

        r.validate({
            rules: {
                from: {
                    required: true,
                },
                to: {
                    required: true,
                },
                jenis: {
                    required: true,
                },
                kegiatan: {
                    required: true,
                }
            }
        }), r.valid() && (r.ajaxSubmit({
            url: "/ellk/update/" + id,
            method: "POST",
            dataType: "json",
            success: function (data) {
                $("#m_form_create")[0].reset();
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
    $("#data_activity").DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });

    //delete data
    $('body').on('click', '#m_deleted', function () {
        var dataId = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#5d78ff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/ellk/delete/' + dataId,
                    type: "GET",
                    dataType: 'json',
                    success: function (response, status, error) {
                        swal.fire({
                            type: status,
                            title: 'Your Data has been deleted',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
                    },
                    error: function (response, status, error) {
                        swal.fire({
                            type: status,
                            title: 'Something when wrong',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        })
                    }
                });
            }
        });

    });

    //data update details
    $('body').on('click', '#m_update', function () {
        var id = $(this).attr('data-id');

        $.get('/ellk/detail/' + id, function (data) {
            console.log('data: ', data);
            const fullTime = data.jam;
            const forTime = fullTime.split(' -')[0];
            const toTime = fullTime.split(' - ').pop();

            $('#idData').val(data.id);
            $('#catatan').val(data.catatan);
            $('#jenis').val(data.jenis);
            $('#kegiatan').val(data.kegiatan);
            $('#from').val(forTime);
            $('#to').val(toTime);
        });

    });

});


