@push('js')

<!-- product filter section start -->
<script type="text/javascript">
$(document).ready(function(){

    $(".js-range-slider").ionRangeSlider();
    const fetch_data = (page, sort_name, sort_type, search_name, category_search, price) => {
        if(sort_name === undefined){
            sort_name = "id";
        }
        if(sort_type === undefined){
            sort_type = "DESC";
        }
        if(search_name === undefined){
            search_name = "";
        }
        if(category_search === undefined){
            category_search = "";
        }
        if(price === undefined){
            price = "";
        }
        
        $.ajax({ 
            
            url:"/products?sort_name="+sort_name+"&sort_type="+sort_type+"&category="+category_search+"&price="+price+"&search_name="+search_name+"&page="+page,

            success:function(data){
                $('#product_section').empty();
                $('#product_section').html(data);
            }
        });   
    }

    $('#clear_filter').click(function(){
        location.reload();
    });
    
    /* After clicking dropdown filter link */
    $('#select_filter').change(function(){
        get_filter_values('#select_filter');
    });

    /* Search by name */
    $('#search_filter').keyup(function(){
        get_filter_values('#search_filter');
    });

    $('.multi_search_filter').change(function(){
        get_filter_values('.multi_search_filter');
    });

    $('.js-range-slider').change(function(){
        $('.price_change').val(1); // set 1 for price range slider modified
        get_filter_values('.js-range-slider');
    });

    /* pagination traversing */
    $('body').on('click', '.pagination .page-item a', function(event){
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);  
        get_filter_values('pagination',page);
        event.preventDefault();
    });
    /* pagination traversing */

    function set_first_page()
    {
        $('#hidden_page').val(1);    
    }

    function get_filter_values(args="", page="")
    {
        if(args!='pagination')
        {
            var page = $('#hidden_page').val();    
        }     
        else
        {
            set_first_page();
        }
            

        var sort_name = $('#select_filter').find(':selected').attr('data-name');
        var sort_type = $('#select_filter').find(':selected').attr('data-order');
        var search_name = $('#search_filter').val();

        var category_search = $.map($('input[name="category_checkbox"]:checked'), function(c){return c.value; });
        
        var price = "";
        var price_change = $('.price_change').val();
        if(price_change == 1)
        {
            var price = $('.js-range-slider').val();
            price = price.replace(";",",");
        }

        fetch_data(page, sort_name, sort_type, search_name, category_search, price);
    }

});
</script>
<!-- product filter section end -->
@endpush