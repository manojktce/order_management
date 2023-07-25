<div class="card-body">
  <div class="form-group">
    {{ Form::label('title', 'Title *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('title', (empty($result) ? old('title') : $result->title) , ['class' => 'form-control']) }}
  </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>