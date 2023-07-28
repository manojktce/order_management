@include('includes.header')
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        @include('products.partials.side_filter')
                    </div>
                </div>
                <div class="col-lg-9">
                    
                    @include('products.partials.top_filter')
                    @include('products.include.products_block')
                    @include('products.include.product_pagination')

                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
    @include('products.include.product_filter_script')
    @include('includes.footer')