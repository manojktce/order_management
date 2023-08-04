@foreach($result['ratings'] as $res)
<div class="review_item">
  <div class="media">
    <div class="d-flex review_image">
      @php $imgUrl = $res->users->getFirstMediaUrl('profile_pictures','thumb') @endphp
      <img src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}">
    </div>
    <div class="media-body">
      <h4>{{ $res->users->first_name." ".$res->users->last_name }}</h4>
        @for($i=1; $i<=$res->rating; $i++)
          <i class="fa fa-star"></i>
        @endfor
    </div>
  </div>
  <p>
    {{ $res->review }}
  </p>
</div>
@endforeach