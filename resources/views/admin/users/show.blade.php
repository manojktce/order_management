@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <h4>Name: {{ $user->first_name." ".$user->last_name }}</h4>
              <h4>Email: {{ $user->email }}</h4>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection