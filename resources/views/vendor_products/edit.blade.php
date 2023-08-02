
@include('includes.header')
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Vendor Products</h2>
            <p>Home <span>-</span>Vendor Products</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area padding_top">
  <div class="container">  
    
    <h4><b>Edit product</b></h4>
    

    <div class="card-body">
        {{ Form::model($result, ['route' => [ "vendor_product.update", $result->id ],'method' => 'put', 'class' => 'form-horizontal','id'  => 'vendorProductForm','files'=> true]) }}
            @include('vendor_products.partials.form')
        {!! Form::close() !!}
      </div>
  </div>
</section>
<!--================End Cart Area =================-->
@include('includes.custom_scripts')
@include('includes.footer')