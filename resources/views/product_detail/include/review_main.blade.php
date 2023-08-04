<div class="row">
    <div class="col-lg-6">
      <div class="row total_rate">
            @include('product_detail.include.review_rating_header')
      </div>
      <div class="review_list">
            @include('product_detail.include.review_list')
      </div>
    </div>
    <div class="col-lg-6">
      <div class="review_box">
            @include('product_detail.partials.review_form')
      </div>
    </div>
  </div>