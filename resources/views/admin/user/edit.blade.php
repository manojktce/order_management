@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')
    
      <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary float-right mr-2">Back</a>
        </div>
      </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Update User</h3>
                            </div>
                            {{-- <div class="card-body">

                                <!-- form start -->
                                {!! Form::open(['route' => 'user.update', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputFname">First Name</label><span class="text-danger">*</span>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputFname" placeholder="Enter First Name" value="{{ $result->first_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputLname">Last Name</label><span class="text-danger">*</span>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputLname" placeholder="Enter Last Name" value="{{ $result->last_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label><span class="text-danger">*</span>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" value="{{ $result->email }}" readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>User Type</label><span class="text-danger">*</span>
                                        <select class="form-control" name="user_type">
                                <h3 class="card-title">Update User</h3>
                                          <option value="User" {{ $role_name == 'User' ? 'selected' : '' }}>User</option>
                                          <option value="Vendor" {{ $role_name == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                                        </select>
                                      </div>

                                    <div class="form-group">
                                        <label for="exampleInputStripe">Stripe ID</label>
                                        <input type="text" name="stripe_id" class="form-control" id="exampleInputStripe" placeholder="Enter Stripe ID" value="{{ $result->stripe_id }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status"><span class="text-danger">*</span>
                                        <option value="1" {{ $result->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $result->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Profile Image</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        </div>
                                    </div>

                                    <!-- Image Preview Section by Manoj -->
                                    <div class="row card">
                                        <div class="image-preview">
                                            @if(!empty($result->getFirstMediaUrl('images','thumb')))
                                            <img id="user-img-preview" src="{{ $result->getFirstMediaUrl('images','thumb') }}" height="100px" width="250px">
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Image Preview Section by Manoj -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                
                                {!! Form::close() !!}

                            </div> --}}

                            <div class="card-body">
                                {!! Form::open([$result], ['route' =>array('user.update', $result->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
                                @csrf
                                @include('admin.user.partials.form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>      
</div>
@endsection