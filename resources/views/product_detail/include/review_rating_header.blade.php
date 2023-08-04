<div class="col-6">
    <div class="box_total">
      <h5>Overall</h5>
      <h4>{{ round($result['products']->product_ratings()->avg('rating'),1) }}</h4>
      <h6>({{ $result['products']->product_ratings()->count() }} Reviews)</h6>
    </div>
  </div>
  <div class="col-6">
    <div class="rating_list">
      <h3>Based on {{ $result['products']->product_ratings()->count() }} Reviews</h3>
        @include('product_detail.include.total_ratings')
    </div>
  </div>
  