<div class="review_box mt-4">
  <h4>Add a Review</h4>
  <form class="row contact_form" id="reviewForm" action="{{ route('add_review', encrypt($result['products']->id)) }}" method="post">
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

<script type="text/javascript">
    $("#reviewForm").validate({
        rules: {
            message : {
                required : true,
                minlength: 10,
                maxlength: 100,
            },
        },
        messages : {
            message : {
                required        : "Review is required",
                minlength       : "Review requires atleast 10 Characters",
                maxlength       : "Review does not exceeds 100 Characters",
            },
        }
    });    
</script>