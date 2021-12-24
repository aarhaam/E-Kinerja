/*=========================================================================================
    File Name: datatables-basic.js
    Description: Basic Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Frest HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

    /****************************************
     *       js of zero configuration        *
     ****************************************/

    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var isEdit = false;

    $('#table-employee').DataTable({
        responsive : true,
        processing: true,
        ajax: "/employee-data",
        columns : [
            {"data" : "employee_id"},
            {"data" : "name"},
            {"data" : "email"},
            {"data" : "occupation"},
            {"data" : "employee_id",
                render: function(data, type, row) {
                    return `<a id="editEmployee" class=" btn btn-md btn-info" data-id='`+data +`' style="margin: 5px 0px;"><i class="bx bx-message-square-edit"></i></a>
                            <a id="deleteEmployee" class=" btn btn-md btn-danger" data-id='`+data +`' ><i class="bx bx-trash"></i></a>`;
                }
            },
        ]
    });

    $('#addEmployee').click(function(){
        $('#modalInput').modal('show');
    })

    $(document).on('click', '#close-button', function (e) {
        e.preventDefault();

        isEdit = false;
        $('#password').prop("disabled", false);
        $('#formEmployee').trigger("reset");
        $("#modalInput").trigger("reset");
        $("#modalInput").modal("hide");
    })

    $(document).on('click', '#editEmployee', function (e) {
        e.preventDefault();

        isEdit = true;
        let id = $(this).attr("data-id");
        $.get('get-employee-data/'+id, function(data){
            $('#modalInput').modal('show');
            $('#employee_id').val(data.employee_id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#password').prop("disabled", true);
            $('#occupation').val(data.occupation);
        });
    })

    $('#formEmployee').submit(function(e){
        e.preventDefault();

        var formData = {
            employee_id : $('#employee_id').val()
        }

        //buat boolean untuk form edit
        if(isEdit === false){
            $.ajax({
                data: new FormData(this),
                url: "/add-employee",
                type: "POST",
                dataType: "JSON",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formEmployee').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#table-employee').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formEmployee').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        } else {
            $('#method').val('PUT');
            $.ajax({
                data: new FormData(this),
                url: "/update-employee/"+formData.employee_id,
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formEmployee').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#table-employee').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                    $('#method').val('POST');
                    $('#password').prop("disabled", false);
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formEmployee').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                    $('#method').val('POST');
                }
            })
        }
    })

    $(document).on('click', '#deleteEmployee', function(e){
       e.preventDefault();
       let id = $(this).attr('data-id');
       Swal.fire({
           title: "Apakah anda ingin menghapus data karyawan ini ?",
           type: "warning",
           confirmButtonText: "Ya",
           confirmButtonClass: "btn-primary",
           showCancelButton: true,
           cancelButtonText: "Tidak",
           cancelButtonClass: "btn-secondary"
       }).then((result) => {
           if(result.value){
               $.ajax({
                   url: '/delete-employee/'+id,
                   type: "DELETE",
                   success: function(data){
                       if(data.status === true){
                           $('#table-employee').DataTable().ajax.reload();
                           Swal.fire("Berhasil", data.message, "success");
                       } else {
                           Swal.fire("Gagal", data.message, "error")
                       }
                   }
               })
           } else {
               Swal.fire("Dibatalkan", "Data kamu aman", "info");
           }
       })
    });
});
