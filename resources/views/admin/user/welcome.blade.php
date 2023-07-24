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
                    <a href="{{ route('users.create') }}" class="btn btn-outline-secondary float-right mr-2">Add User</a>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered data-table">
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
                </table>
            </div>
        </div>
      </div>
    </section>
</div>

<script type="text/javascript">
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first name'},
            {data: 'last_name', name: 'last name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script>

<script type="text/javascript">
$(function() {	
$.getScript("https://www.jqueryscript.net/demo/Delete-Confirmation-Dialog-Plugin-with-jQuery-Bootstrap/bootstrap-confirm-delete.js", function(){
	  $('.delete').bootstrap_confirm_delete({
		  heading: 'Delete',
		  message: 'Are you sure you want to delete this record?'		
});
	 });
});
</script>

@endsection
