@php $rate_1 = 0; $rate_2 = 0; $rate_3 = 0; $rate_4 = 0; $rate_5 = 0; $total = 0; $count = 0; @endphp
@foreach($result['products']->product_ratings as $res)
  @php
  $rating = $res->rating;
  $total = $total + $rating;
  $count = $count + 1;
  switch ($rating) {
    case "1":
      $rate_1 = $rate_1+1;
      break;
    case "2":
      $rate_2 = $rate_2+1;
      break;
    case "3":
      $rate_3 = $rate_3+1;
      break;
    case "4":
      $rate_4 = $rate_4+1;
      break;
    case "5":
      $rate_5 = $rate_5+1;
      break;
    default:
  }
  @endphp
@endforeach

<ul class="list">
  <li>
    <a href="#"><b>5 Star</b>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <b>({{ $rate_5 }})</b>
    </a>
  </li>
  <li>
    <a href="#"><b>4 Star</b>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <b>({{ $rate_4 }})</b>
    </a>  
  </li>
  <li>
    <a href="#"><b>3 Star</b>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <b>({{ $rate_3 }})</b>
    </a>
  </li>
  <li>
    <a href="#"><b>2 Star</b>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>            
      <b>({{ $rate_2 }})</b>
    </a>
  </li>
  <li>
    <a href="#"><b>1 Star</b>
      <i class="fa fa-star"></i>
      <b>({{ $rate_1 }})</b>
    </a>
  </li>
</ul>