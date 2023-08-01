<div class="col-lg-12 col-lx-4">
  <div class="single_confirmation_details">
    <h4>order info</h4>
    <ul>
      @foreach($result['order_details'] as $order)
      <li>
        <p>Order number</p><span>: {{ $order->id }}</span>
      </li>
      <li>
        <p>Reference number</p><span>: {{ $order->stripe_pi_id }}</span>
      </li>
      <li>
        <p>Total Amount</p><span>: {{ $order->total_amount }}</span>
      </li>
      <li>
        <p>Created at</p><span>: {{ $order->created_at }}</span>
      </li>
      @endforeach
    </ul>
  </div>
</div>