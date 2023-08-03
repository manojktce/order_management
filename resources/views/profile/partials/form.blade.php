{{ Form::model($result, ['route' => [ "profile.update", $result['user']->id ],'method' => 'put', 'class' => 'form-horizontal','id'  => 'profileForm','files'=> true]) }}

<div class="form-group">
  {{ Form::label('first_name', 'First Name', ['class' => 'col-sm-6 col-form-label']) }}
  {{ Form::text('first_name', (empty($result['user']) ? old('first_name') : $result['user']->first_name) , ['class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('last_name', 'Last Name', ['class' => 'col-sm-6 col-form-label']) }}
  {{ Form::text('last_name', (empty($result['user']) ? old('last_name') : $result['user']->last_name) , ['class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('email', 'Email *', ['class' => 'col-sm-6 col-form-label']) }}
  {{ Form::text('email', (empty($result['user']) ? old('email') : $result['user']->email), ['class' => 'form-control'] ) }}
</div>

  
<div class="form-group">
    {{ Form::label('password', 'Password *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('confirm_password', 'Confirm Password *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::password('confirm_password', ['class' => 'form-control']) }}
</div>
  

<div class="card-footer">
  <button type="submit" class="btn btn-outline-primary">Submit</button>
  <a href="{{ route('home') }}" class="btn btn-outline-danger"><b>Back</b></a>
</div>

{!! Form::close() !!}