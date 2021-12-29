$(document).ready(function(){
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    //tab activity
    $('#table-progress').DataTable({
        responsive : true,
        processing : true,
        ajax : '/employee-activity',
        columnDefs : [
            { responsivePriority: 1 }
        ],
        columns : [
            {"data" : "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data" : "indicator_work.name_indicator"},
            {"data" : "description"},
            {"data" : "date"},
            {"data" : "grade",
                render: function(data, row){
                    if(data === 1){
                        return 'Sangat Kurang 😞 ️';
                    } else if (data === 2){
                        return 'Kurang 🙁 ️';
                    } else if (data === 3){
                        return 'Cukup 🙂 ️';
                    } else if (data === 4){
                        return 'Baik 🤓 ';
                    } else if (data === 5){
                        return 'Sangat Baik 😍 ';
                    } else {
                        return 'Belum ada penilaian';
                    }
                }
            },
            {"data" : "id",
                render: function(data, row){
                    return `<a id="editProgress" class=" btn btn-md btn-info" data-id='`+data +`' style="margin: 5px 0px;"><i class="bx bx-message-square-edit"></i></a>
                            <a id="deleteProgress" class=" btn btn-md btn-danger" data-id='`+data +`' ><i class="bx bx-trash"></i></a>`;
                }
            }
        ]
    });

    $('#addActivity').click(function(){
        $('#modalInput').modal('show');
    });

    $(document).on('click', '#close-button', function (e) {
        e.preventDefault();

        $('#formProgressWork').trigger("reset");
        $("#modalInput").trigger("reset");
        $("#modalInput").modal("hide");
    })

    $(document).on('click', '#editProgress', function(e){
       e.preventDefault();

       let id = $(this).attr("data-id");
        $.get('get-employee-activity/'+id, function(data){
            $('#modalInput').modal('show');
            $('#id').val(data.id);
            $('#indicator_id').val(data.indicator_id);
            $('#description').val(data.description);
            $('#date').val(data.date);
        });
    });

    $('#formProgressWork').submit(function(e){
        e.preventDefault();

        let formData = {
            id : $('#id').val()
        }

        if(formData.id){
            $('#method').val('PUT');
            $.ajax({
                data: new FormData(this),
                url: "/update-employee-activity/"+formData.id,
                type: "POST",
                dataType: "json",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formProgressWork').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#id').val("");
                    $('#table-progress').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                    $('#method').val('POST');
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formProgressWork').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                    $('#method').val('POST');
                }
            })
        } else {
            $.ajax({
                data: new FormData(this),
                url: "/add-activity",
                type: "POST",
                dataType: "JSON",
                contentType: false,
                processData: false,
                success : function(data){
                    $('#formProgressWork').trigger("reset");
                    $('#modalInput').trigger("reset");
                    $('#modalInput').modal("hide");
                    $('#table-progress').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                },
                error : function(data){
                    console.log('Error : ', data);
                    $('#formProgressWork').trigger("reset");
                    $('#modalInput').trigger("reset");
                    Swal.fire("Wrong request", data.responseJSON.message, "error");
                }
            })
        }
    })


    $(document).on('click', '#deleteProgress', function (e) {
        e.preventDefault();

        let id = $(this).attr('data-id');
        Swal.fire({
            title: "Apakah anda ingin menghapus data aktivitas ini ini ?",
            type: "warning",
            confirmButtonText: "Ya",
            confirmButtonClass: "btn-primary",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            cancelButtonClass: "btn-secondary"
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url: '/delete-activity/'+id,
                    type: "DELETE",
                    success: function(data){
                        if(data.status === true){
                            $('#table-progress').DataTable().ajax.reload();
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
    })


    //tab indicator
    $('#table-indicator').DataTable({
        autoWidth: false,
        responsive : true,
        processing: true,
        ajax: '/employee-indicator',
        columnDefs : [
            { responsivePriority: 1 }
        ],
        columns : [
            {"data" : "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data" : "name_indicator"}
        ]
    });
})
