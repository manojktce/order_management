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
                    <a href="{{ route('user.create') }}" class="btn btn-outline-secondary float-right mr-2">Add User</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- <table class="table table-bordered data-table" id="user-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table> --}}
                {!! $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'datatable-buttons']) !!}
            </div>
        </div>
      </div>
    </section>
</div>

{{-- <script type="text/javascript">
    var table = $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script> --}}
<script src="{{ asset('libs/datatables/datatable.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('admin/js/datatablefunctions.js') }}"></script>
@endsection