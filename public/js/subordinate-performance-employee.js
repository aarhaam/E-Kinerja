
$(document).ready(function(){
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#table-subordinate').DataTable({
        responsive: true,
        processing: true,
        ajax: "/subordinate-performance-data",
        columns: [
            {"data" : "subordinate[0].name"},
            {"data" : "subordinate[0].occupation"},
            {"data" : "subordinate[0].employee_id",
                render: function(data, type, row) {
                    return `<a id="progressInfo" class=" btn btn-md btn-info" data-id='`+data +`' style="margin: 2px 0px;"><i class="bx bx-book-open"></i></a>
                            <a id="rateProgress" class=" btn btn-md btn-dark" data-id='`+data +`' style="margin: 2px 0px;"><i class="bx bx-calendar-check"></i></a>`;
                }
            }
        ]
    });

    $(document).on('click', '#progressInfo', function (e) {
        e.preventDefault();

        $('#modalPerformance').modal('show');

        let id = $(this).attr("data-id");

        $('#table-performance').DataTable({
            responsive: true,
            processing: true,
            ajax: "/subordinate-performance-data/"+id,
            columns: [
                {"data" : "employee_id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data" : "description"},
                {"data" : "indicator_work.name_indicator"},
                {"data" : "date"}
            ],
            bDestroy: true
        });
    });

    $(document).on('click', '#closeModalPerformance', function (e) {
        e.preventDefault();

        $('#table-performance').DataTable().clear().draw();
    })

    $(document).on('click', '#rateProgress', function (e) {
        e.preventDefault();

        let id = $(this).attr('data-id');
        $('#modalRate').modal('show');
        $('#employee_id').val(id);
    })

    $('#close-button').click(function (e) {
        e.preventDefault();

        $('#employee_id').val("");
        $('#formRate').trigger("reset");
        $('#modalRate').trigger("reset");
        $('#modalRate').modal('hide');
    })

    $('#formRate').submit(function (e) {
        e.preventDefault();

        // let id = $(this).attr('data-id');
        $('#method').val('PUT');
        $.ajax({
            data: new FormData(this),
            url: '/subordinate-grade-data',
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false,
            success : function(data){
                if(data.status === true){
                    $('#formRate').trigger("reset");
                    $('#modalRate').trigger("reset");
                    $('#modalRate').modal("hide");
                    // $('#table-subordinate').DataTable().ajax.reload();
                    Swal.fire("Berhasil", data.message, "success");
                    $('#method').val('POST');
                    // $('#subordinate').prop("disabled", false);
                }
                // else {
                //     $('#formSubordinate').trigger("reset");
                //     $('#modalInput').trigger("reset");
                //     $('#modalInput').modal("hide");
                //     $('#table-subordinate').DataTable().ajax.reload();
                //     Swal.fire("Berhasil", data.message, "error");
                //     $('#method').val('POST');
                //     $('#subordinate').prop("disabled", false);
                // }
            },
            error : function(data){
                console.log('Error : ', data);
                $('#formRate').trigger("reset");
                $('#modalRate').trigger("reset");
                Swal.fire("Wrong request", data.responseJSON.message, "error");
                $('#method').val('POST');
            }
        })
    })
})
