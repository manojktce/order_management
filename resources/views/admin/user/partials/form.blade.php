@method('POST')
<div class="card-body">
  <div class="form-group">
    {{ Form::label('first_name', 'First Name *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('first_name', (empty($result) ? old('first_name') : $result->first_name) , ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('last_name', 'Last Name *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('last_name', (empty($result) ? old('last_name') : $result->last_name), ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('email', 'Email *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('email', (empty($result) ? old('email') : $result->email), ['class' => 'form-control']) }}
  </div>
  
  <div class="form-group">
    {{ Form::label('password', 'Password *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('cnf_password', 'Confirm Password *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('user_type', 'User Type *')}}
    {!! Form::select('user_type', $user_type, null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {{ Form::label('stripe_id', 'Stripe ID', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('stripe_id', (empty($result) ? old('stripe_id') : $result->stripe_id), ['class' => 'form-control']) }}
  </div>
                        
  <div class="form-group">
    {{ Form::label('status', 'Status *')}}
    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Profile Image</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>
    </div>
  </div>

  <!-- Image Preview Section by Manoj -->
  <div class="row card">
    <div class="image-preview"></div>
  </div>
  <!-- Image Preview Section by Manoj -->

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>