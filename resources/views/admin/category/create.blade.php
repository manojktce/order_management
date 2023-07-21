@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')
    
      <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('users') }}" class="btn btn-outline-secondary float-right mr-2">Back</a>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Category</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputTitle">Category Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Category Title">
                      </div>
                                            
                      <div class="form-group">
                        <label>Status</label><span class="text-danger">*</span>
                        <select class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
            
                    </div>
                    <!-- /.card-body -->
            
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
@endsection
