<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="cart_listing">
      @include('cart.include.cart_listing_block')
    </tbody>
  </table>
</div>

@include('cart.include.cart_script')