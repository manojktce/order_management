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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img src="{{ $user->getFirstMediaUrl('images','thumb') }}" width="120px"></td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                  @csrf
                                  <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                  <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to to delete this user?');"><i class="fa fa-trash"></i></button>
                              </form>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection