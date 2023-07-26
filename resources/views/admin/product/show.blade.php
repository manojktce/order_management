@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-left">
              @php $imgUrl = $result->getFirstMediaUrl('product_images','thumb') @endphp
              <img class="profile-user-img"
              src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-left">{{ $result->title }}</h3>

            <p class="text-muted text-left">{{ $result->title }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Title</b> <a class="float-right">{{ $result->title }}</a>
              </li>


              <li class="list-group-item">
                <b>Description</b> <a class="float-right">{{ $result->description }}</a>
              </li>


              <li class="list-group-item">
                <b>Category</b> <a class="float-right">{{ $result->category->title }}</a>
              </li>

              <li class="list-group-item">
                <b>Created By</b> <a class="float-right">{{ $result->users->first_name." ".$result->users->last_name }}</a>
              </li>

              <li class="list-group-item">
                <b>Created at</b> <a class="float-right">{{ $result->created_at }}</a>
              </li>
              <li class="list-group-item">
                <b>Updated at</b> <a class="float-right">{{ $result->updated_at }}</a>
              </li>
            </ul>

            
            <b>Product Images :</b>

                    @foreach ($result->getMedia('product_images') as $image)
                    <div class="row card m-3">
                      <img src="{{ $image->getUrl() }}" style = "width:100%; height:400px;">
                    </div>
                    @endforeach

            <a href="{{ route('product.index') }}" class="btn btn-outline-primary btn-block mt-5"><b>Back</b></a>
          </div>
          <!-- /.card-body -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection