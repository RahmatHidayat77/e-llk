


$(function () {

  // add data 
  $("#m_form_create").on('submit', function (l) {

    l.preventDefault();

    var t = $("#m_submit"),
      r = $(this).closest("form"),
      spnr = $("#spinner");

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
    }), r.valid() && (spnr.addClass("spinner-border spinner-border-sm"),(r.ajaxSubmit({
      url: "/users/add",
      method: "POST",
      dataType: "json",
      success: function (data) {
        spnr.removeClass("spinner-border spinner-border-sm")
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
        spnr.addClass("spinner-border spinner-border-sm")
        console.log(error);
        swal.fire({
          type: 'error',
          title: 'Something when wrong',
          confirmButtonText: 'Ok'
        })
      }
    })))
  });

  // init datatable 
  $('#data_users_reguler').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            exportOptions: {
              columns: [ 0, 1, 2, 3, 4 ]
            }
        },
        // {
        //     extend: 'pdfHtml5',
        //     exportOptions: {
        //       columns: [ 0, 1, 2, 3, 4 ]
        //     },
        // },
        {
          extend: 'print',
          title: ' ',
          exportOptions: {
              columns: [ 0, 1, 2, 3, 4 ]
          },
          customize: function(win) {
            $(win.document.body).prepend('<img src="https://dwi.web.id/head-table.png" style="position:relative;margin-left:auto;margin-right:auto;margin-bottom:30px;" />');
          }
      },

    ]
} );

  // table.columns([1, 2]).select();
  // table.columns('.aksi').deselect();

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
          url: '/users/delete/' + dataId,
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


  // data details 
  $('body').on('click', '#m_detail', function () {
    var id = $(this).attr('data-id');

    $('#m_submit_update').addClass('d-none');
    $('#input_file').addClass('d-none');
    $('#password_group').addClass('d-none');
    $('#fullname').attr('readonly', true);
    $('#nip').attr('readonly', true);
    $('#jabatan').attr('readonly', true);
    $('#email').attr('readonly', true);

    $.get('/users/detail/' + id, function (data) {
      console.log('data: ', data);

      $('#photoUser').attr("src", data.foto);
      $('#fullname').val(data.name);
      $('#nip').val(data.nip);
      $('#jabatan').val(data.jabatan);
      $('#email').val(data.email);
    });
  });

  //data update details
  $('body').on('click', '#m_update', function () {
    var id = $(this).attr('data-id');

    $('#m_submit_update').removeClass('d-none');
    $('#input_file').removeClass('d-none');
    $('#password_group').removeClass('d-none');
    $('#fullname').attr('readonly', false);
    $('#nip').attr('readonly', false);
    $('#jabatan').attr('readonly', false);
    $('#email').attr('readonly', true);

    $.get('/users/detail/' + id, function (data) {
      console.log('data: ', data);

      $('#photoUser').attr("src", data.foto);
      $('#fullname').val(data.name);
      $('#nip').val(data.nip);
      $('#jabatan').val(data.jabatan);
      $('#email').val(data.email);
      $('#idData').val(data.id);
    });

  });

  // data update action 
  $("#m_form_update").on('submit', function (l) {
    l.preventDefault();

    var t = $("#m_submit_update"),
      r = $(this).closest("form");
    id = $("#idData").val();

    console.log('id: ',id);

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
        password:{
          required: true,
        }
      }
    }), r.valid() && (r.ajaxSubmit({
      url: "/users/update/" + id,
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


});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#photoUser')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
  }
}

