
  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="{{ route('purchase') }}" method="post" id="regForm">
              @csrf
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first_name" name="first_name" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="last_name" />
                <span class="placeholder" data-placeholder="Last name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="email" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
              
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="add1" />
                <span class="placeholder" data-placeholder="Address line 01"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" />
                <span class="placeholder" data-placeholder="Town/City"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
              </div>
              <div class="col-md-12 form-group">
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>
              </div>
            {{-- </form> --}}
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <li>
                  @foreach($items as $item)
                  <a href="#">
                    <i> {{ $item->name }} </i>   x <b>{{ $item->quantity }}</b>
                    <span class="last">${{ $item->price }}</span>
                  </a>
                  @endforeach
                </li>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Total
                    <span>${{ \Cart::session(Auth::user()->id)->getSubTotal() }}</span>
                  </a>
                </li>
              </ul>
              <div class="creat_account">
                <input type="checkbox" id="agree-option" name="selector" />
                <label for="agree-option">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <button class="btn_3" type="submit">Proceed to Pay</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->
@include('includes.footer')
<script>
  $(document).ready(function() {
      $("#regForm").validate({
          rules: {
              first_name: "required",
          }
      });
  });
</script>
@include('includes.footer_scripts')
