<div class="card-body">
  <div class="form-group">
    {{ Form::label('title', 'Title *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('title', (empty($result) ? old('title') : $result->title) , ['class' => 'form-control']) }}
  </div>

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
</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('category.index') }}" class="btn btn-danger"><b>Cancel</b></a>
</div>