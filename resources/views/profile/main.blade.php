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
        <div class="col-lg-4 mt-5">
            @php $imgUrl = $result['user']->getFirstMediaUrl('profile_pictures','thumb') @endphp
            <img class="profile-user-img img-fluid img-circle" src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}" alt="User profile picture">

            <form method="post" action="{{ route('profile_upload',$result['user']->id) }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                @method('PUT')
                @csrf
            </form>             
        </div>
      </div>
    </div>
  </section>
<!--================ confirmation part end =================-->
<script type="text/javascript">
  Dropzone.options.dropzone =
   {
      maxFilesize: 1,
      renameFile: function(file) {
          var dt = new Date();
          var time = dt.getTime();
         return time+file.name;
      },
      acceptedFiles: ".jpeg,.jpg,.png",
      addRemoveLinks: true,
      timeout: 5000,
      success: function(file, response) 
      {
          console.log(response);
          toastr.success('Profile Picture Updated');
          $(".confirmation_part").load(location.href + " .confirmation_part"); // refresh the entire div
      },
      error: function(file, response)
      {
         return false;
      }
};
</script>
@include('includes.custom_scripts')
@include('includes.footer')