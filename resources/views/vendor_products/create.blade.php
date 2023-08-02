
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
    
    
    <h3>Create product</h3>
    

    <div class="card-body">
      {!! Form::open(['route' =>'vendor_product.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'vendor_prod-form', 'class' => 'container']) !!}
            @include('vendor_products.partials.form')
      {!! Form::close() !!}
      </div>
  </div>
</section>
<!--================End Cart Area =================-->
@include('includes.custom_scripts')
@include('includes.footer')