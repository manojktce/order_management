<div class="row">
    <div class="col-lg-12">
        <div class="product_top_bar d-flex justify-content-between align-items-center">
            <div class="single_product_menu">
                <p><b>Products List</b></p>
            </div>
            <div class="single_product_menu d-flex">
                <h5>Sort by : </h5>
                <select id="select_filter">
                    <option data-display="Select">Select</option>
                    <option value="title_one" data-name="title" data-order="ASC">Name - A-Z</option>
                    <option value="title_two" data-name="title" data-order="DESC">Name - Z-A</option>
                    <option value="price_one" data-name="price" data-order="ASC">Low to High</option>
                    <option value="price_two" data-name="price" data-order="DESC">High to Low</option>
                </select>
            </div>
            
            <div class="single_product_menu d-flex">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="search_filter" value="" aria-describedby="inputGroupPrepend" autocomplete="off">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="ti-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>