@push('js')

<script>
    function increment(id) 
    {
        document.getElementById('demoInput_'+id+'').stepUp();
        cart_update(id,1);
    }
    function decrement(id=null) 
    {
        document.getElementById('demoInput_'+id+'').stepDown();
        cart_update(id,2);
    }

    function cart_update(id,option)
    {
        $.ajax({ 
            url:"/updateCart/"+id+"/"+option,
            success:function(data){
                toastr.success('Cart Updated Successfully !!!');
                //$('#cart_listing').empty();
                //$('#cart_listing').html(data);
                $(".cart_inner").load(location.href + " .cart_inner"); // refresh the entire div
            }
        });   
    }

    function delCart(id)
    {
        var result = confirm("Want to remove from the cart?");
        if (result) {
           deleteCart(id); 
        }
    }

    function deleteCart(id)
    {
        $.ajax({ 
            
            url:"/deleteCart/"+id,

            success:function(data){
                toastr.success('Product successfully removed from cart.');
                // $('#cart_listing').empty();
                // $('#cart_listing').html(data);
                $(".cart_inner").load(location.href + " .cart_inner"); // refresh the entire div
            }
        });
    }
</script>
@endpush