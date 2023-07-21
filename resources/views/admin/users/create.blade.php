@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')
    
      <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('users') }}" class="btn btn-outline-secondary float-right mr-2">Back</a>
        </div>
      </div>
    

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">User Creation</h3>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <form action="#" method="post">
        @csrf
        <div class="card-body">
          
          <div class="form-group">
            <label for="exampleInputFname">First Name</label>
            <input type="text" name="first_name" class="form-control" id="exampleInputFname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label for="exampleInputLname">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="exampleInputLname" placeholder="Enter Last Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="exampleInputCnfPassword1">Confirm Password</label>
            <input type="password" name="cnf_password" class="form-control" id="exampleInputCnfPassword1" placeholder="Re-enter Password">
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    
  </div>
@endsection