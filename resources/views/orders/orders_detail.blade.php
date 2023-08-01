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
    <div class="container">
      <div class="row">

        @include('orders.include.order_detail_order_info')
        @include('orders.include.order_detail_shipping_info')

      </div>
      <div class="row">
        
        @include('orders.include.order_detail_block')

      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->
@include('includes.footer')