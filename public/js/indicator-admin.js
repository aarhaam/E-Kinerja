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


    $('#table-indicator').DataTable({
        responsive : true,
        processing: true,
        ajax: '/indicator-data',
        columnDefs : [
            { responsivePriority: 1 }
        ],
        columns : [
            {"data" : "name"},
            {"data" : "name_indicator"},
            {"data" : "id",
                render: function(data, row){
                    return `<a id="editIndicator" class=" btn btn-md btn-info" data-id='`+data +`' style="margin: 5px 0px;"><i class="bx bx-message-square-edit"></i></a>
                            <a id="deleteIndicator" class=" btn btn-md btn-danger" data-id='`+data +`' ><i class="bx bx-trash"></i></a>`;
                }
            }
        ]
    });

    $('#addEmployee').click(function(){
        $('#modalInput').modal('show');
    })
    //
    $(document).on('click', '#close-button', function (e) {
        e.preventDefault();

        $('#formIndicator').trigger("reset");
        $("#modalInput").trigger("reset");
        $("#modalInput").modal("hide");
    })
    //
    $(document).on('click', '#editIndicator', function (e) {
        e.preventDefault();

        let id = $(this).attr("data-id");
        $.get('get-indicator-data/'+id, function(data){
            $('#modalInput').modal('show');
            $('#id').val(data.id);
            $('#employee_id').val(data.employee_id);
            $('#name_indicator').val(data.name_indicator);
        });
    })
    //
    $('#formIndicator').submit(function(e){
        e.preventDefault();

        var formData = {
            id : $('#id').val()
        }

        //buat boolean untuk form edit
        if(formData.id){
            $('#method').val('PUT');
            $.ajax({
                data: new FormData(this),
                url: "/update-indicator/"+formData.id,
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formIndicator').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#table-indicator').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                    $('#method').val('POST');
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formIndicator').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                    $('#method').val('POST');
                }
            })
        } else {
            $.ajax({
                data: new FormData(this),
                url: "/add-indicator",
                type: "POST",
                dataType: "JSON",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formIndicator').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#table-indicator').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formIndicator').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    })
    //
    $(document).on('click', '#deleteIndicator', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        Swal.fire({
            title: "Apakah anda ingin menghapus data indikator ini ?",
            type: "warning",
            confirmButtonText: "Ya",
            confirmButtonClass: "btn-primary",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            cancelButtonClass: "btn-secondary"
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url: '/delete-indicator/'+id,
                    type: "DELETE",
                    success: function(data){
                        if(data.status === true){
                            $('#table-indicator').DataTable().ajax.reload();
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
