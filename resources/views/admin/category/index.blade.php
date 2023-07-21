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
                    <a href="{{ route('category.create') }}" class="btn btn-outline-secondary float-right mr-2">Add Category</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered data-table" id="category-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
      </div>
    </section>
</div>

<script type="text/javascript">
  var table = $('#category-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('category.index') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'id'},
          {data: 'title', name: 'title'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
</script>

@endsection
