<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $info['title'] }}</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <strong>Whoops!</strong> There were some problems with your input.<br>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
