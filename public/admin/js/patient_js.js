$(document).ready(function() {
    /* Patient History */
    var table = $('#patientHistorydataTable').DataTable( {
        serverSide: true,
        ordering: true,
        ajax: $('#patientHistorydataTable').data('route')+'?patient_id='+$('#patientHistorydataTable').data('patient_id'),
        columns: [
            { data: 'created_at' },
            { data: 'details', name: 'details'},
            { data: 'action', searchable: false,  orderable: false },
        ]
    });

    $('#history-modal').on('shown.bs.modal', function(event) {

        var submiturl = $(event.relatedTarget).data("url");
        $("#model_submiturl").val(submiturl);

        var patient_id = $(event.relatedTarget).data("patient_id");
        $("#model_patient_id").val(patient_id);

        var history_id = $(event.relatedTarget).data("id");
        $("#model_history_id").val(history_id);

        var details = $(event.relatedTarget).data("details");
        console.log(details);
        $("textarea#details").val(details);
    });


    $("#history-submit").on("click", function () {
        $(".details-error").hide();

        var details = $("#details").val();
        var patient_id = $("#model_patient_id").val();
        var history_id = $("#model_history_id").val();
        var btnTxt = $(this).html();

        var submiturl = $("#model_submiturl").val();
        if(history_id){
            var submitmethod = 'PUT';
        }else{
            var submitmethod = 'POST';
        }

        if (details == "") {
            $(".details-error").show();
        } else {
            $.ajax({
                url: submiturl,
                method: submitmethod,
                data: {'details': details, 'patient_id': patient_id},
                beforeSend: function () {
                    $(this).html("Please Wait...").prop("disabled", true);
                },
                success: function (result) {
                    $(this).html(btnTxt).prop("disabled", false);
                    if (result.status == "success") {
                        $('#history-modal').modal('toggle');
                        if ( $.fn.DataTable.isDataTable( '#patientHistorydataTable' ) ) {
                            $('#patientHistorydataTable').DataTable().ajax.reload();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    var errors = $.parseJSON(xhr.responseText);
                    $('.modal-body').html('<p class="alert alert-danger">' + errors.error + '</p>').show().delay(5000).fadeOut(5000);
                    $(this).html(btnTxt).prop("disabled", false);
                }
            });
        }
        return false;
    });

    /* Patient Payments */
    var paymentTable = $('#patientPaymentdataTable').DataTable( {
        serverSide: true,
        ordering: true,
        ajax: $('#patientPaymentdataTable').data('route')+'?patient_id='+$('#patientPaymentdataTable').data('patient_id'),
        columns: [
            { data: 'payment_date' },
            { data: 'payment_amount', name: 'payment_amount'},
            { data: 'status', name: 'status'},
            { data: 'action', searchable: false,  orderable: false },
        ]
    });

    $('#payment-modal').on('shown.bs.modal', function(event) {

        var submiturl = $(event.relatedTarget).data("url");
        $("#pmodel_submiturl").val(submiturl);

        var patient_id = $(event.relatedTarget).data("patient_id");
        $("#pmodel_patient_id").val(patient_id);

        var payment_id = $(event.relatedTarget).data("id");
        $("#model_payment_id").val(payment_id);

        var payment_date = $(event.relatedTarget).data("payment_date");
        $("#payment_date").val(payment_date);

        var amount = $(event.relatedTarget).data("payment_amount");
        $("#payment_amount").val(amount);

        var payment_desc = $(event.relatedTarget).data("payment_desc");
        $("#payment_desc").val(payment_desc);

        var status = $(event.relatedTarget).data("status");
        $("#payment_status").val(status);
    });

    $("#payment-submit").on("click", function () {
        var errflag = 1;
        $(".payment_amount-error").hide();
        $(".payment_date-error").hide();

        var patient_id = $("#pmodel_patient_id").val();
        var payment_id = $("#model_payment_id").val();
        var payment_amount = $("#payment_amount").val();
        var payment_date = $("#payment_date").val();
        var payment_status = $("#payment_status").val();
        var payment_desc = $("#payment_desc").val();
        var btnTxt = $(this).html();

        var submiturl = $("#pmodel_submiturl").val();
        if(payment_id){
            var submitmethod = 'PUT';
        }else{
            var submitmethod = 'POST';
        }

        if (payment_amount == "") {
            $(".payment_amount-error").show();
            errflag = 0;
        }

        if(payment_date == ""){
            $(".payment_date-error").show();
            errflag = 0;
        }

        if(errflag) {
            $.ajax({
                url: submiturl,
                method: submitmethod,
                data: {
                    'patient_id': patient_id,
                    'payment_amount': payment_amount,
                    'payment_date': payment_date,
                    'status': payment_status,
                    'payment_desc': payment_desc
                },
                beforeSend: function () {
                    $(this).html("Please Wait...").prop("disabled", true);
                },
                success: function (result) {
                    $(this).html(btnTxt).prop("disabled", false);
                    if (result.status == "success") {
                        $('#payment-modal').modal('toggle');
                        if ($.fn.DataTable.isDataTable('#patientPaymentdataTable')) {
                            $('#patientPaymentdataTable').DataTable().ajax.reload();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    var errors = $.parseJSON(xhr.responseText);
                    $('.modal-body').html('<p class="alert alert-danger">' + errors.error + '</p>').show().delay(5000).fadeOut(5000);
                    $(this).html(btnTxt).prop("disabled", false);
                }
            });
        }

        return false;
    });

    /* Patient Files */
    var fileTable = $('#patientFiledataTable').DataTable( {
        serverSide: true,
        ordering: true,
        ajax: $('#patientFiledataTable').data('route')+'?patient_id='+$('#patientFiledataTable').data('patient_id'),
        columns: [
            { data: 'name' },
            { data: 'mime' },
            { data: 'created_at', name: 'created_at'},
            { data: 'action', searchable: false,  orderable: false },
        ]
    });
});

/* patient File Upload - Dropzone */
var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(".dropzone",{
    maxFilesize: 10,  // 10 mb
    acceptedFiles: ".jpeg,.jpg,.png,.pdf",
});

myDropzone.on("sending", function(file, xhr, formData) {
    formData.append("_token", CSRF_TOKEN);
});

myDropzone.on("complete", function(file) {
    myDropzone.removeFile(file);
    $('#patientFiledataTable').DataTable().ajax.reload();
});