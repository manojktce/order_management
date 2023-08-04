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
                    <a href="{{ route('product.index') }}" class="btn btn-outline-secondary float-right mr-2">Back</a>
                </div>
              </div>
            </div>

            @if($result->product_ratings->count() < 1)
            <div class="card">
                <div class="card-body mb-5">
                    <h4 class="text-danger">No Reviews for this Product</h4>
                </div>
            </div>
            @endif
            <!-- /.card-header -->
            @foreach ($result->product_ratings as $res)
            <div class="card">
                <div class="card-body mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Rated By: </b>    
                        </div>
                        <div class="col-md-8">
                            <a href={{ route('user.show', $res->users->id) }}>{{ $res->users->first_name }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Rating: </b>    
                        </div>
                        <div class="col-md-8">
                            @for($i=1;$i<=$res->rating;$i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Review: </b>    
                        </div>
                        <div class="col-md-8">
                            {!! $res->review !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <b>Review on: </b>    
                        </div>
                        <div class="col-md-8">
                            {{ $res->created_at }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </section>
</div>
@endsection
{{-- @include('admin.includes.datatables_script') --}}