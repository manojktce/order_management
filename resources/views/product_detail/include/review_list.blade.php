@if($result['products']->product_ratings()->count()<1)
<div class="review_item">
  <h4>No reviews found !!!</h4>
</div>
@else
@foreach($result['products']->product_ratings as $res)
  <div class="review_item">
    <div class="media">
      <div class="d-flex review_image">
        @php $imgUrl = $res->users->getFirstMediaUrl('profile_pictures','thumb') @endphp
        <img src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}" style="width:50px; height:50px;">
      </div>
      <div class="media-body">
        <h4>{{ $res->users->first_name." ".$res->users->last_name }}</h4>
          @for($i=1; $i<=$res->rating; $i++)
            <i class="fa fa-star"></i>
          @endfor
      </div>
    </div>
    <p>
      {!! $res->review !!}
    </p>
  </div>
  @endforeach
  {{-- <div class="col-lg-12">
      <div class="pageination">
          <nav aria-label="Page navigation example">
              {!! $result['ratings']->withQueryString()->links('pagination::bootstrap-5') !!}
          </nav>
      </div>
  </div> --}}
@endif