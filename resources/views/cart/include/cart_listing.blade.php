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
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>
          <div class="media">
            <div class="d-flex">
              <img src="{{ $item->associatedModel->getFirstMediaUrl('product_cover_image','thumb') }}" alt="" width="100px" height="75px" />
            </div>
            <div class="media-body">
              <p>{{ $item->name }}</p>
            </div>
          </div>
        </td>
        <td>
          <h5>${{ $item->price }}</h5>
        </td>
        <td>
          <div class="product_count">
            <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
            <input class="input-number" type="text" value="{{ $item->quantity }}" min="0" max="10" id="{{ $item->id }}">
            <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
          </div>
        </td>
        <td>
          <h5>${{ $item->price * $item->quantity }}</h5>
        </td>
        <td><i class="fa fa-trash"></td>
      </tr>
      @endforeach
      <tr class="bottom_button">
        <td colspan="5">
          <a class="btn_1" href="{{ route('clearCart') }}">Clear Cart</a>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><h5 text-align="right">Subtotal</h5></td>
        <td><h5>{{ \Cart::session(Auth::user()->id)->getTotalQuantity() }}</h5></td>
        <td colspan="2">
          <h5>${{ \Cart::session(Auth::user()->id)->getSubTotal() }}</h5>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="checkout_btn_inner float-right">
    <a class="btn_1" href="{{ route('products') }}">Continue Shopping</a>
    <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
  </div>
</div>