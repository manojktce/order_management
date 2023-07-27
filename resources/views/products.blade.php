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
                                        <a href="#">{{ $res->title }}</a>
                                        <span>({{ count($res->product) }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets price_rangs_aside" style="display: none;">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <!-- <div id="slider-range"></div> -->
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
                                    <p><span>{{  count($result['products']) }}</span> Product Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>Sort by : </h5>
                                    <select>
                                        <option data-display="Select">Name</option>
                                        <option value="1">Price</option>
                                    </select>
                                </div>
                                
                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach($result['products'] as $prod)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{ url('/products'.'/'.Str::slug($prod->title).'/'.$prod->id) }}">
                                        <img src="{{ $prod->getFirstMediaUrl('product_cover_image','thumb') }}" alt="{{ $prod->title }}">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{ $prod->title }}</h4>
                                        <h3>${{ $prod->price }}</h3>
                                        <p>Created by : <b>{{ $prod->users->first_name }}</b></p>
                                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        

                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                        {{ $result['products']->links("pagination::bootstrap-4") }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    @include('includes.footer')