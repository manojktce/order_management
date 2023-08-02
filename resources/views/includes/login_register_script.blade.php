<script>
    $(document).ready(function(){
        jQuery.validator.addMethod("noSpace", function(value, element) { 
            return value.indexOf(" ") < 0 && value != ""; 
        }, "Space are not allowed");
    });
    
</script>

<script type="text/javascript">
    $("#registerForm").validate({
        rules: {
            first_name : {
                required : true,
                minlength: 3,
                maxlength: 15,
            },
            last_name : {
                required : true,
                minlength: 3,
                maxlength: 15,
            },
            email: "required",
            password: {
                required : true,
                minlength: 8,
            },
            password_confirmation: {
                minlength: 8,
                equalTo: "#password"
            },
        },
        messages : {
            first_name : {
                required        : "First Name is required",
                minlength       : "First Name requires atleast 3 Characters",
                maxlength       : "First Name not exceeds 15 Characters",
            },
            last_name : {
                required    : "First Name is required",
                minlength   : "First Name requires atleast 3 Characters",
                maxlength   : "First Name not exceeds 15 Characters",
            },
            email : "Email is required",
            password : {
                required : "Password is required",
                minlength : "Minimum 8 characters required",
            },
        }
    });    
</script>

<script type="text/javascript">
    $("#userLoginForm").validate({
        rules: {
            email: "required",
            password: "required",
        },
        messages : {
            email : "Email is required",
            password : "Password is required",
        }
    });    
</script>