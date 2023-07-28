@push('js')

<!-- product filter section start -->
<script type="text/javascript">
$(document).ready(function(){

    const fetch_data = (page, sort_name, sort_type, search_name, category_search) => {
        if(sort_name === undefined){
            sort_name = "";
        }
        if(sort_type === undefined){
            sort_option = "";
        }
        if(search_name === undefined){
            search_name = "";
        }
        if(category_search === undefined){
            category_search = "";
        }
        
        $.ajax({ 
            url:"/products?sort_name="+sort_name+"&sort_type="+sort_type+"&category="+category_search+"&price=1&search_name="+search_name+"&page="+page,
            success:function(data){
                $('#product_section').empty();
                $('#product_section').html(data);
            }
        });   
    }

    /* After clicking dropdown filter link */
    $('#select_filter').change(function(){
        var sort_name = $(this).find(':selected').attr('data-name');
        var sort_type = $(this).find(':selected').attr('data-order');
        $('#hidden_page').val(1);
        var page = $('#hidden_page').val();
        fetch_data(page,sort_name,sort_type,"","");
    });

    /* After clicking pagination link */
    $('body').on('click', '.pagination .page-item a', function(event){
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        
        var sort_name = $('#select_filter').find(':selected').attr('data-name');
        var sort_type = $('#select_filter').find(':selected').attr('data-order');
        var search_name = $('#search_filter').val();

        fetch_data(page, sort_name, sort_type, search_name, "");
        event.preventDefault();
    });

    /* Search by name */
    $('#search_filter').keyup(function(){
        $('#select_filter').find('option:selected').remove();
        var search_name = $(this).val();
        $('#hidden_page').val(1);
        var page = $('#hidden_page').val();
        fetch_data(page , "", "", search_name, "");
    });

    $('.multi_search_filter').change(function(){
        console.log($('.js-range-slider').val());
        var category_search = $.map($('input[name="category_checkbox"]:checked'), function(c){return c.value; })
        $('#hidden_page').val(1);
        var page = $('#hidden_page').val();
        fetch_data(page , "", "", "" , category_search);
    });

});
</script>
<!-- product filter section end -->
@endpush