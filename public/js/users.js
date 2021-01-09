


$(function () {
  $("#m_form_create").on('submit', function (l) {

    l.preventDefault();

    var t = $("#m_submit"),
      r = $(this).closest("form");

    r.validate({
      rules: {
        fullname: {
          required: true,
        },
        nip: {
          required: true,
        },
        email: {
          required: true,
        },
      }
    }), r.valid() && (r.ajaxSubmit({
      url: "/users/add",
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

  $('#data_users_reguler').DataTable();

});