@include('includes.header')

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Order Confirmation</h2>
              <p>Home <span>-</span> Order Confirmation</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part padding_top">
    <div class="row">
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <a href=" {{ route('vendors_order') }}" class="btn btn-outline-danger">Back</a>
      </div>
    </div>

    <div class="container">
      <div class="row">

        @include('vendor_orders.include.order_detail_order_info')
        @include('vendor_orders.include.order_detail_shipping_info')

      </div>
      <div class="row">
        
        @include('vendor_orders.include.order_detail_block')

      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->
@include('includes.footer')