@include('includes.header')
<!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Profile Details</h2>
              <p>Home <span>-</span> Profile Details</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-8">
          <div class="order_details_iner">

            {{ Form::model($result, ['route' => [ "profile.update", $result['user']->id ],'method' => 'put', 'class' => 'form-horizontal','id'  => 'profileForm','files'=> true]) }}
            
            @include('profile.partials.form')
            
            {!! Form::close() !!}

          </div>
        </div>
        <div class="col-lg-4">
          <div class="order_details_iner">
            Profile
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->
@include('includes.custom_scripts')
@include('includes.footer')