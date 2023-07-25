$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".alert-success").delay(3200).fadeOut(600);

    $(".datepicker-here").flatpickr({
		dateFormat: "Y-m-d",
	});

    // toastr.options = {
	// 	"closeButton": true,
	// 	"debug": false,
	// 	"newestOnTop": true,
	// 	"progressBar": true,
	// 	"positionClass": "toast-top-right",
	// 	//"preventDuplicates": true,
	// 	"onclick": null,
	// 	"showDuration": "300",
	// 	"hideDuration": "1000",
	// 	"timeOut": "5000",
	// 	"extendedTimeOut": "1000",
	// 	"showEasing": "swing",
	// 	"hideEasing": "linear",
	// 	"showMethod": "fadeIn",
	// 	"hideMethod": "fadeOut"
	// }

    $('[data-parsley-validate]').parsley({
        focus: 'first',
        errorClass: 'is-invalid',
        successClass: 'is-valid',
        errorsWrapper: '<p class="parsley-error-list"></p>',
        errorTemplate: '<span class="parsley-error text-danger"></span>',
        classHandler: function (el) {
            let element = el.element;            
        }
    });

    $('[required]').each(function(){
        $(this).closest('.form-group').find('label').addClass('required');
    })

    $('.password-toggle').click(function() {
        if($(this).find('i').hasClass('fa-eye')) {
            $(this).closest('.form-group').find(':input').attr('type', "text");
            $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $(this).closest('.form-group').find(':input').attr('type', "password");
            $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    })
});