<div class="review_box">
  <p>Your Rating: 
  @foreach($result['ratings'] as $res)
    @php
      if($res->users_id != Auth::User()->id)
      continue;
    @endphp

    @for($i=1; $i<=$res->rating; $i++)
      <i class="fa fa-star"></i>
    @endfor
  @endforeach
  </p> 
</div>

<div class="review_box mt-4">
  <h4>Add a Review</h4>
  <form class="row contact_form" action="{{ route('add_review', encrypt($result['products']->id)) }}" method="post" novalidate="novalidate">
    @csrf
    <div class="col-md-12">
      <div class="form-group">
        <div class="rating">
          <label>
            <input type="radio" name="stars" value="1" />
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
          </label>
          <label>
            <input type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>
      </div>
    </div>
    
    <div class="col-md-12">
      <div class="form-group">
        <textarea class="form-control" id="summernote" name="message" rows="25" placeholder="Review"></textarea>
      </div>
    </div>
    <div class="col-md-12 text-right">
      <button type="submit" value="submit" class="btn_3">
        Submit Now
      </button>
    </div>
  </form>
</div>