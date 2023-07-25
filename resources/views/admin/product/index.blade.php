@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('product.create') }}" class="btn btn-outline-secondary float-right mr-2">Add Product</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'datatable-buttons']) !!}
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
@include('admin.includes.datatables_script')