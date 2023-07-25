$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-parsley-validate]').parsley({
        focus: 'first',
        errorClass: 'is-invalid',
        successClass: 'is-valid',
        errorsWrapper: '<p class="parsley-error-list"></p>',
        errorTemplate: '<span class="parsley-error text-danger"></span>',
        classHandler: function (el) {
            let element = el.element;
            console.log(element);
        }
    });

    $('[required]').each(function(){
        $(this).closest('.form-group').find('label').addClass('required');
    })
});