@push('js')

<!-- product filter section start -->
<script type="text/javascript">

function delCart(id)
{
    var result = confirm("Want to remove from the cart?");
    if (result) {
        $.ajax({ 
        
            url:"/deleteCart/"+id,

            success:function(data){
                alert('Product successfully removed from cart.');
                location.reload();
            }
        });
    }
}
</script>
<!-- product filter section end -->
@endpush