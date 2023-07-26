<div class="card-body">

  <div class="form-group">
    {{ Form::label('users_id', 'Select User *', ['class' => 'col-sm-12 col-form-label']) }}
    {!! Form::select('users_id', $selectLookups['users'], (empty($result) ? old('users_id') : $result->users_id),['class' => 'col-sm-12 form-control']) !!}
  </div>

  <div class="form-group">
    {{ Form::label('category', 'Category *', ['class' => 'col-sm-12 col-form-label']) }}
    {!! Form::select('category_id', $selectLookups['category'], (empty($result) ? old('title') : $result->title),['class' => 'col-sm-12 form-control']) !!}
  </div>

  <div class="form-group">
    {{ Form::label('title', 'Title *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('title', (empty($result) ? old('title') : $result->title) , ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('description', 'Description *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::text('description', (empty($result) ? old('description') : $result->description) , ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('price', 'Price *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::number('price', (empty($result) ? old('price') : $result->price) , ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('quantity', 'Quantity *', ['class' => 'col-sm-6 col-form-label']) }}
    {{ Form::number('qty', (empty($result) ? old('qty') : $result->qty) , ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Upload Images</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile" multiple>
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>
    </div>
  </div>

  <div class="row card">
    <div class="image-preview">
        @foreach ($result->getMedia('product_images') as $image)
          <img src="{{ $image->getUrl() }}" style = "width:300px; height:200px;">
        @endforeach
    </div>
  </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>