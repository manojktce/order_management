@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              @php $imgUrl = $result->getFirstMediaUrl('profile_pictures','thumb') @endphp
              <img class="profile-user-img img-fluid img-circle"
              src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $result->first_name." ".$result->last_name }}</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $result->email }}</a>
              </li>

              <li class="list-group-item">
                <b>User Type</b> <a class="float-right">{{ $info['role_name'] }}</a>
              </li>

              <li class="list-group-item">
                <b>Stripe ID</b> <a class="float-right">{{ $result->stripe_id }}</a>
              </li>
              <li class="list-group-item">
                <b>Status</b> <a class="float-right">{{ $result->status == 1 ? 'Active' : 'Inactive' }}</a>
              </li>
              <li class="list-group-item">
                <b>Created at</b> <a class="float-right">{{ $result->created_at }}</a>
              </li>
              <li class="list-group-item">
                <b>Updated at</b> <a class="float-right">{{ $result->updated_at }}</a>
              </li>
            </ul>

            <a href="{{ route('user.index') }}" class="btn btn-outline-primary btn-block"><b>Back</b></a>
          </div>
          <!-- /.card-body -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection