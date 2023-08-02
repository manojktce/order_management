<div class="col-lg-12 col-lx-4">
  <div class="single_confirmation_details">
    <h4>shipping Address</h4>
    
    @foreach($result['order_details'] as $addr)
    <ul>
      <li>
        <p>First Name</p><span>:{{ $addr->orders_address->first_name }}</span>
      </li>
      <li>
        <p>Last Name</p><span>:{{ $addr->orders_address->last_name }}</span>
      </li>
      <li>
        <p>Email</p><span>:{{ $addr->orders_address->email }}</span>
      </li>
      <li>
        <p>Mobile Number</p><span>:{{ $addr->orders_address->mobile_number }}</span>
      </li>
      <li>
        <p>Address</p><span>:{{ $addr->orders_address->address }}</span>
      </li>
      <li>
        <p>City</p><span>:{{ $addr->orders_address->city }}</span>
      </li>
      <li>
        <p>Zip Code</p><span>:{{ $addr->orders_address->zipcode }}</span>
      </li>
      <li>
        <p>Notes</p><span>:{{ $addr->orders_address->notes }}</span>
      </li>
    </ul>
    @endforeach
  </div>
</div>