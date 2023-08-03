@push('js')
<script type="text/javascript">
    Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop file to change the Profile Image";
    Dropzone.options.dropzone =
     {
        maxFilesize:10,
        maxFiles: 1,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png",
        addRemoveLinks: true,
        timeout: 5000,
        success: function(file, response) 
        {
            console.log(response);
            localStorage.setItem("Status","Profile Image updated")
            window.location.reload(); 
            //$('#image_section').empty();
            //$('#image_section').html(response);
            //$(".confirmation_part").load(location.href + " .confirmation_part"); // refresh the entire div
        },
        error: function(file, response)
        {
           return false;
        }
  };
  </script>

<script>
$(document).ready(function(){
    //get it if Status key found
    if(localStorage.getItem("Status"))
    {
        toastr.success(localStorage.getItem("Status"));
        localStorage.clear();
    }
});
</script>

@endpush