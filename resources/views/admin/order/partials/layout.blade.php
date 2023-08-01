<div class="card-body">
    <h4>Order Details</h4>
    <div class="row">
      <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="vert-tabs-order-tab" data-toggle="pill" href="#vert-tabs-order" role="tab" aria-controls="vert-tabs-order" aria-selected="true">Order Details</a>
          <a class="nav-link" id="vert-tabs-shipping-tab" data-toggle="pill" href="#vert-tabs-shipping" role="tab" aria-controls="vert-tabs-shipping" aria-selected="false">Shipping Details</a>
          <a class="nav-link" id="vert-tabs-product-tab" data-toggle="pill" href="#vert-tabs-product" role="tab" aria-controls="vert-tabs-product" aria-selected="false">Product Details</a>
        </div>
      </div>
      <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
          <div class="tab-pane text-left fade show active" id="vert-tabs-order" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
              @include('admin.order.includes.order_info')
          </div>
          <div class="tab-pane fade" id="vert-tabs-shipping" role="tabpanel" aria-labelledby="vert-tabs-shipping-tab">
              @include('admin.order.includes.shipping_info')
          </div>
          <div class="tab-pane fade" id="vert-tabs-product" role="tabpanel" aria-labelledby="vert-tabs-product-tab">
              @include('admin.order.includes.product_info')
          </div>
        </div>
      </div>
    </div>
  </div>