<div class="form-group">
  {{ Form::label('first_name', 'First Name', ['class' => 'col-sm-6 col-form-label']) }}
  {{ Form::text('first_name', (empty($result['user']) ? old('first_name') : $result['user']->first_name) , ['class' => 'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('last_name', 'Last Name', ['class' => 'col-sm-6 col-form-label']) }}
  {{ Form::text('last_name', (empty($result['user']) ? old('last_name') : $result['user']->last_name) , ['class' => 'form-control']) }}
</div>

<div class="card-footer">
  <button type="submit" class="btn btn-outline-primary">Submit</button>
  <a href="{{ route('home') }}" class="btn btn-outline-danger"><b>Back</b></a>
</div>