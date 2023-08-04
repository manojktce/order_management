@push('js')
<script type="text/javascript">
    Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop file to change the Profile Image";
    Dropzone.options.dropzone =
     {
        maxFiles: 5,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        init: function() { 
            myDropzone = this;

            $.ajax({
                url: '{{ route("readFiles") }}',
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $.each(response, function(key,value) {
                        var mockFile = { name: value.name, size: value.size };     
                        mockFile['media_id'] = value.id;
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, value.original_url);
                        myDropzone.emit("complete", mockFile);                        
                    });
                }
            });
        },
        acceptedFiles: ".jpeg,.jpg,.png",
        addRemoveLinks: true,
        timeout: 5000,
        success: function(file, response) 
        {
            //console.log(response);
            localStorage.setItem("Status","Profile Image updated")
            window.location.reload(); 
        },
        removedfile: function(file) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/deleteFile/",
                type: "POST",
                data: { "media_id" : file.media_id },
                success: function(data)
                {
                    localStorage.setItem("Status","Selected Profile Image removed")
                    window.location.reload(); 
                }
            });
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

<script>
    $("#profileForm").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: "required",
            // zip: "required",
        },
        messages : {
            first_name : "First Name is required",
            last_name : "Last Name is required",
            email: "Email is required",
            // zip : "ZipCode is required",
        }
    });    
</script>
@endpush