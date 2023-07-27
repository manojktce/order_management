@push('js')
<script type="text/javascript">
$(document).ready(function(){
    const fetch_data = (page, sort_name, sort_type) => {
        if(sort_name === undefined){
            sort_name = "";
        }
        if(sort_type === undefined){
            sort_option = "";
        }
        
        $.ajax({ 
            url:"/products?sort_name="+sort_name+"&sort_type="+sort_type+"&page="+page,
            success:function(data){
                console.log(data);
                $('#product_section').empty();
                $('#product_section').html(data);
            }
        });
        
    }

    $('#select_filter').change(function(){
        var sort_name = $(this).find(':selected').attr('data-name');
        var sort_type = $(this).find(':selected').attr('data-order');
        $('#hidden_page').val(1);
        var page = $('#hidden_page').val();
        fetch_data(page,sort_name,sort_type);
    });

    $('body').on('click', '.pagination .page-item a', function(event){
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var sort_name = $('#select_filter').find(':selected').attr('data-name');
        var sort_type = $('#select_filter').find(':selected').attr('data-order');
        fetch_data(page, sort_name, sort_type);
        event.preventDefault();
    });

});
</script>

@endpush