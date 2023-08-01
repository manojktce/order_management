@include('includes.header')
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Order History</h2>
              <p>Home <span>-</span> Order History</p>
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
      @if(count($result['orders'])<1)
        <h2>Orders Not Found !!!</h2>
      @else
        <h2>Order History</h2>
      @endif
      @foreach($result['orders'] as $order)
      <div class="card card-default mt-2 mb-4">
        <div class="card-header"><button class="btn btn-sm btn-success">Order #{{ $order->id }}</button></div>
        <div class="card-body">
          <h4>Reference ID : {{ $order->stripe_pi_id }}</h4>
          <h4>Amount : {{ $order->total_amount }}</h4>
          <h4>Purchased on : {{ $order->created_at }}</h4>
        </div>
        <div class="card-footer">
          <p align="right"><a href="{{ route('order_details',encrypt($order->id)) }}" class="btn btn-sm btn-outline-primary">View Details</a></p>
        </div>
      </div>
      @endforeach

      <div class="col-lg-12">
          <div class="pageination">
              <nav aria-label="Page navigation example">
                  {!! $result['orders']->withQueryString()->links('pagination::bootstrap-5') !!}
              </nav>
          </div>
      </div>


    </div>
  </section>
  <!--================ confirmation part end =================-->

  @include('includes.custom_scripts')
  @include('includes.footer')