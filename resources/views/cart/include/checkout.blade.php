
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
                  {{ Form::label('first_name', 'First Name *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('first_name', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-6 form-group p_star">
                  {{ Form::label('last_name', 'Last Name *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('last_name', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-6 form-group p_star">
                  {{ Form::label('mobile_number', 'Mobile Number *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::number('mobile_number', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-6 form-group p_star">
                  {{ Form::label('email', 'Email *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('email', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              
              <div class="col-md-12 form-group p_star">
                  {{ Form::label('addr1', 'Address *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('addr1', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-12 form-group p_star">
                  {{ Form::label('city', 'City *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('city', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-12 form-group p_star">
                  {{ Form::label('zip', 'Zip *', ['class' => 'col-sm-6 col-form-label p_star']) }}
                  {!! Form::text('zip', '' ,['class' => 'col-sm-12 form-control']) !!}
              </div>
              <div class="col-md-12 form-group">
                  {{ Form::label('messaage', 'Message', ['class' => 'col-sm-6 col-form-label']) }}
                  {!! Form::textarea('message', '' ,['class' => 'col-sm-12 form-control']) !!}
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
  // $(document).ready(function() {
      $("#regForm").validate({
          rules: {
              first_name: "required",
              last_name: "required",
              mobile_number: "required",
              email: "required",
              addr1: "required",
              city: "required",
              zip: "required"

          },
          messages : {
              first_name : "First Name is required",
              last_name : "Last Name is required",
              mobile_number : "Mobile Number is required",
              email : "Email is required",
              addr1 : "Address is required",
              city : "City is required",
              zip : "ZipCode is required",
          }
      });
  // });
</script>
@include('includes.footer_scripts')
