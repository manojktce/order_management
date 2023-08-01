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
    <button class="btn btn-sm btn-outline-primary" onclick="decrement({{ $item->id }})">-</button>
    <input value="{{ $item->quantity }}" id="demoInput_{{ $item->id }}" type="number" disabled min="1" max="5">
    <button class="btn btn-sm btn-outline-primary" onclick="increment({{ $item->id }})">+</a>
    {{-- <a href="{{ route('updateCart',$item->id) }}" class="add_cart">Add More</a> --}}
  </td>
  <td>
    <h5>${{ $item->price * $item->quantity }}</h5>
  </td>
  <td><a href="javascript:void(0);" onclick="delCart({{ $item->id }})"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach
{{-- <tr class="bottom_button">
  <td colspan="5">
    <a class="btn_1" href="{{ route('clearCart') }}">Clear Cart</a>
  </td>
</tr> --}}
<tr>
  <td></td>
  <td><h5 text-align="right">Subtotal</h5></td>
  <td><h5>{{ \Cart::session(Auth::user()->id)->getTotalQuantity() }}</h5></td>
  <td colspan="2">
    <h5>${{ \Cart::session(Auth::user()->id)->getSubTotal() }}</h5>
  </td>
</tr>