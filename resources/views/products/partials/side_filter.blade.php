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
            
            <input type="text" class="js-range-slider" name="js-price" value="" data-type="double"
            data-min="{{ $result['products']->min('price') }}"
            data-max="{{ $result['products']->max('price') }}"
            data-from="{{ $result['products']->min('price') }}"
            data-to="{{ $result['products']->max('price') }}"
            data-grid="true" />

            <input type="hidden" class="price_change" value="0"/>
            <div class="d-flex">
                <div class="price_text d-flex justify-content-center">
                    <p>From:</p>
                </div>
                <div class="price_value d-flex justify-content-center">
                    <input type="text" class="js-input-from" id="amount" readonly />
                </div>
            </div>
            <div class="d-flex">
                <div class="price_text d-flex justify-content-center">
                    <p>To:</p>
                </div>
                <div class="price_value d-flex justify-content-center">
                    <input type="text" class="js-input-to" id="amount" readonly/>
                </div>
            </div>
        </div>
    </div>
</aside>

<aside class="left_widgets">
    <div class="widgets_inner">
        <button class="btn btn-sm btn-outline-danger text-center" id="clear_filter">Clear Filter</button>
    </div>
</aside>