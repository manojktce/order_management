@include('includes.header')
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($result['categories'] as $res)
                                    <li>
                                        <input type="checkbox" class="form-check-input multi_search_filter" name="category_checkbox" value="{{ $res->id }}">{{ $res->title }}
                                        <span>({{ count($res->product) }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets price_rangs_aside">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <div id="slider-range"></div>
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex">
                                        <div class="price_text">
                                            <p>Price :</p>
                                        </div>
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
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
                                        <option value="title" data-name="title" data-order="ASC">Name</option>
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
                    <div class="row align-items-center latest_product_inner" id="product_section">
                        @include('products_block')
                    </div>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
    @include('includes.custom_scripts')
    @include('includes.footer')