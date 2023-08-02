
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
    <h3 align="center"><b>Vendor Products</b></h3>
    <div class="row">
      <div class="col-lg-12">
          <a href="{{ route('vendor_product.create') }}" class="btn btn-outline-secondary float-right mr-2">Add Product</a>
      </div>
    </div>
    
    <div class="card-body">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'datatable-buttons']) !!}
      </div>
  </div>
</section>
<!--================End Cart Area =================-->
@include('includes.datatables_script')
@include('includes.custom_scripts')
@include('includes.footer')