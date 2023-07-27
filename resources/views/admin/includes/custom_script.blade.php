<script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
          toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
          toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
          toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
          toastr.warning("{{ session('warning') }}");
    @endif
  </script>
  
  <!-- Delete Confirmation add by manoj -->
  <script type="text/javascript">
    $('body').on('click', '.btndelete', function () {
        $this = $(this);
        confirm("Are You sure want to delete ?");
     
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: "DELETE",
            url:  '/'+ $this.data('route')+'/' + $this.data('id'),
            success: function (res) {
                console.log('res');
                toastr.success('Record deleted successfully !');
                $('#datatable-buttons').DataTable().ajax.reload();
            },
            error: function (res) {
                console.log('Error:', res);
            }
        });
 });
  </script>
  <!-- Delete Confirmation add by manoj -->
  
  <!-- image preview script add by manoj refer admin user management create file-->
  <script type="text/javascript">
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
  
        if (input.files) {
            var filesAmount = input.files.length;
            if(filesAmount > 5)
            {
              alert('Only 5 images allowed for product');
              return false;
            }
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
  
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).css({'width' : '300px','height' : '200px'}).appendTo(placeToInsertImagePreview);
                }
  
                reader.readAsDataURL(input.files[i]);
            }
        }
  
    };
  
    $('.custom-file-input').on('change', function() {
        $('div.image-preview').empty(); // clear any previous image
        imagesPreview(this, 'div.image-preview');
    });

    $('.custom-file-input-cover').on('change', function() {
        $('div.image-preview-cover').empty(); // clear any previous cover image
        imagesPreview(this, 'div.image-preview-cover');
    });

  });
  </script>
  <!-- image preview script add by manoj end -->