@push('js')
<script type="text/javascript">

$(document).ready(function(){
    
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

});
</script>
<!-- Delete Confirmation add by manoj -->
<script type="text/javascript">
  $('body').on('click', '.btndelete', function () {
        $this = $(this);
        
        var result = confirm("Want to remove the product?");
        if (result) {
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },
              type: "DELETE",
              url:  '/'+ $this.data('route')+'/' + $this.data('id'),
              success: function (res) {
                  console.log('res');
                  //toastr.success('Record deleted successfully !');
                  $('#datatable-buttons').DataTable().ajax.reload();
              },
              error: function (res) {
                  console.log('Error:', res);
              }
          });
        }
  });
</script>
<!-- Delete Confirmation add by manoj -->
@endpush