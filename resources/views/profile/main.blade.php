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
              @include('profile.partials.form')
          </div>
        </div>
        <div class="col-lg-4 mt-5" id="image_section">  
              @include('profile.partials.image_form')
        </div>
      </div>
    </div>
  </section>

<!--================ confirmation part end =================-->
@include('profile.includes.profile_scripts')
@include('includes.custom_scripts')
@include('includes.footer')