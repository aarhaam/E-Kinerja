$(document).ready(function () {
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    let isEdit = false;

    $('#table-subordinate').DataTable({
        responsive: true,
        processing: true,
        ajax: "/head-data",
        columns: [
            {"data" : "subordinate[0].employee_id"},
            {"data" : "subordinate[0].name"},
            {"data" : "subordinate[0].email"},
            {"data" : "head[0].name"},
            {"data" : "subordinate[0].employee_id",
                render: function(data, type, row) {
                    return `<a id="editHead" class=" btn btn-md btn-info" data-id='`+data +`' style="margin: 2px 0px;"><i class="bx bx-transfer"></i></a>
                            <a id="deleteSubordinate" class=" btn btn-md btn-danger" data-id='`+data +`' style="margin: 2px 0px;"><i class="bx bx-trash"></i></a>`;
                }
            }
        ]
    });

    $('#addSubordinate').on('click', function(){
        $('#modalInput').modal('show');
    })

    $(document).on('click', '#close-button', function (e) {
        e.preventDefault();

        isEdit = false;
        $('#subordinate').prop("disabled", false);
        $('#formSubordinate').trigger("reset");
        $("#modalInput").trigger("reset");
        $("#modalInput").modal("hide");
    })

    $(document).on('click', '#editHead', function (e) {
        e.preventDefault();

        isEdit = true;
        let id = $(this).attr("data-id");
        $.get('get-subordinate-data/'+id, function(data){
            $('#modalInput').modal('show');
            $('#head').val(data.head);
            $('#subordinate').val(data.subordinate);
            // $('#subordinate').prop("disabled", true);
        })
    })

    $('#formSubordinate').submit(function (e) {
        e.preventDefault();

        var formData = {
            subordinate_id : $('#subordinate').val()
        }

        if(isEdit === true){
            $('#method').val('PUT');
            $.ajax({
                data: new FormData(this),
                url: '/update-subordinate-head/'+formData.subordinate_id,
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                success : function(data){
                    if(data.status === true){
                        $('#formSubordinate').trigger("reset");
                        $('#modalInput').trigger("reset");
                        $('#modalInput').modal("hide");
                        $('#table-subordinate').DataTable().ajax.reload();
                        Swal.fire("Berhasil", data.message, "success");
                        $('#method').val('POST');
                        $('#subordinate').prop("disabled", false);
                    } else {
                        $('#formSubordinate').trigger("reset");
                        $('#modalInput').trigger("reset");
                        $('#modalInput').modal("hide");
                        $('#table-subordinate').DataTable().ajax.reload();
                        Swal.fire("Berhasil", data.message, "error");
                        $('#method').val('POST');
                        $('#subordinate').prop("disabled", false);
                    }
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formSubordinate').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", "Karyawan ini memiliki atasan", "error");
                    $('#method').val('POST');
                }
            })
        } else {
            $.ajax({
                data: new FormData(this),
                url: '/add-subordinate',
                type: "POST",
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.status === true){
                        $('#formSubordinate').trigger("reset");
                        $('#modalInput').trigger("reset");
                        $('#modalInput').modal('hide');
                        $('#table-subordinate').DataTable().ajax.reload();
                        Swal.fire("Berhasil", data.message, "success");
                    } else {
                        $('#formSubordinate').trigger("reset");
                        $('#modalInput').trigger("reset");
                        $('#modalInput').modal('hide');
                        $('#table-subordinate').DataTable().ajax.reload();
                        Swal.fire("Gagal", data.message, "error");
                    }
                },
                error: function (data) {
                    console.log("Error : ", data);
                    $('#formSubordinate').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Gagal", data.message, "error");
                }
            })
        }
    });

    $(document).on('click', '#deleteSubordinate', function(e){
        e.preventDefault();
        let id = $(this).attr('data-id');
        Swal.fire({
            title: "Apakah anda ingin menghapus atasan karyawan ini ?",
            type: "warning",
            confirmButtonText: "Ya",
            confirmButtonClass: "btn-primary",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            cancelButtonClass: "btn-secondary"
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url: '/delete-subordinate/'+id,
                    type: "DELETE",
                    success: function(data){
                        if(data.status === true){
                            $('#table-subordinate').DataTable().ajax.reload();
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
})
