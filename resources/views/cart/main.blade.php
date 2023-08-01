
@include('includes.header')
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  
  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
          @if(count($items) < 1)
            <h2>Cart is Empty !!!</h2>
          @else
            @include('cart.include.cart_listing')
            @include('cart.include.checkout')
          @endif
      </div>
  </section>
  <!--================End Cart Area =================-->
  @include('cart.include.cart_script')
  @include('includes.custom_scripts')
  @include('includes.footer')