@php 
$error = $errors->all();
@endphp
<div class="card-body">
  <div class="form-group">
    {{ Form::label('first_name', 'First Name *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('first_name', (empty($result) ? old('first_name') : $result->first_name) , ['class' => 'form-control']) }}
    @if($error)
    
    @endif
  </div>

  <div class="form-group">
    {{ Form::label('last_name', 'Last Name *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('last_name', (empty($result) ? old('last_name') : $result->last_name), ['class' => 'form-control']) }}
  </div>

  {{-- Readonly <div class="form-group">
    {{ Form::label('email', 'Email *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('email', (empty($result) ? old('email') : $result->email), ['class' => 'form-control' , (empty($result) ? '' : 'readonly')] ) }}
  </div> --}}

  <div class="form-group">
    {{ Form::label('email', 'Email *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('email', (empty($result) ? old('email') : $result->email), ['class' => 'form-control'] ) }}
  </div>
  
    @if(Route::currentRouteName() != 'user.edit')
        <div class="form-group">
            {{ Form::label('password', 'Password *', ['class' => 'col-sm-6 col-form-label']) }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('confirm_password', 'Confirm Password *', ['class' => 'col-sm-6 col-form-label']) }}
            {{ Form::password('confirm_password', ['class' => 'form-control']) }}
        </div>
    @endif

  <div class="form-group">
    {{ Form::label('user_type', 'User Type *')}}
    {!! Form::select('user_type', $selectLookups['user_type'], (empty($selectLookups['role_name']) ? null : $selectLookups['role_name']), ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {{ Form::label('stripe_id', 'Stripe ID', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('stripe_id', (empty($result) ? old('stripe_id') : $result->stripe_id), ['class' => 'form-control']) }}
  </div>
                        
  {{-- <div class="form-group">
    {{ Form::label('status', 'Status *')}}
    {!! Form::select('status', $selectLookups['status'], (empty($result) ? old('status') : $result->status), ['class' => 'form-control']) !!}
  </div> --}}

  <div class="form-group">
    <div class="form-check form-check-inline">
      {{ Form::radio('status', 1, ((empty($result) || $result->status == 1) ? true : '') , ['class'=>'form-check-input', 'id' => 'inlineRadio1']) }}
      {{ Form::label('inlineRadio1', 'Active', ['class' => 'form-check-label']) }}
    </div>
    
    <div class="form-check form-check-inline">
      {{ Form::radio('status', 0, ((!empty($result) && $result->status == 1) ? true : ''), ['class'=>'form-check-input', 'id' => 'inlineRadio2']) }}
      {{ Form::label('inlineRadio2', 'In-Active', ['class' => 'form-check-label']) }}
    </div>
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
    <div class="image-preview">
        @if((!empty($result)) && ($result->getFirstMediaUrl('profile_pictures','thumb')))
          <img src="{{ $result->getFirstMediaUrl('profile_pictures','thumb') }}" style = "width:300px; height:200px;">
        @endif
    </div>
  </div>
  <!-- Image Preview Section by Manoj -->

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>