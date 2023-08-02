<div class="col-lg-12">
  <div class="order_details_iner">
    <h3>Order Details</h3>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col" colspan="2">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        @php $tot_qty = 0; $tot_amt = 0; @endphp
        @foreach($result['order_details'] as $order)
          @foreach($order->orders_detail as $od)
            <tr>
              <th colspan="2"><span>{{ $od->products->title }}</span></th>
              <th>x{{ $od->qty }}</th>
              <th> <span>${{ $od->amount }}</span></th>
            </tr>
            @php 
            $tot_amt = $tot_amt + $od->amount;
            $tot_qty = $tot_qty + $od->qty;
            @endphp
          @endforeach
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th scope="col" colspan="2">Quantity</th>
          <th scope="col">{{ $tot_qty }}</th>
          <th scope="col">${{ $tot_amt }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>