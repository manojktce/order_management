@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')
    
      <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('category.index') }}" class="btn btn-outline-secondary float-right mr-2">Back</a>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Update Category</h3>
                </div>
                <div class="card-body">
                  {{ Form::model($result, ['route' => [ "category.update", $result->id ],'method' => 'put', 'class' => 'form-horizontal','id'  => 'categoryForm','files'=> true]) }}
                      @include('admin.category.partials.form')
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
@endsection
