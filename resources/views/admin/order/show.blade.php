@extends('admin.layout.app')

@section('content')
<div class="content-wrapper">
    
    @include('admin.includes.content_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @include('admin.order.partials.layout')

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection