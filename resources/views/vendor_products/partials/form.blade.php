<div class="card-body">

    {{-- <div class="form-group">
      {{ Form::label('users_id', 'Select User *', ['class' => 'col-sm-12 col-form-label']) }}
      {!! Form::select('users_id', $selectLookups['users'], (empty($result) ? old('users_id') : $result->users_id),['class' => 'col-sm-12 form-control']) !!}
    </div> --}}
  
    <div class="row">
      <div class="col-md-6">
  
        <div class="row form-group">
          
          {{ Form::label('category', 'Category *', ['class' => 'col-sm-6 col-form-label']) }}
          {!! Form::select('category_id', $selectLookups['category'], (empty($result) ? old('category_id') : $result->category->id),['class' => 'col-sm-12 form-control']) !!}
          
        </div>  
        
        <div class="row form-group">
          {{ Form::label('title', 'Title *', ['class' => 'col-sm-6 col-form-label']) }}
          {{ Form::text('title', (empty($result) ? old('title') : $result->title) , ['class' => 'form-control']) }}
        </div>
  
        <div class="row form-group">
          {{ Form::label('price', 'Price *', ['class' => 'col-sm-6 col-form-label']) }}
          {{ Form::number('price', (empty($result) ? old('price') : $result->price) , ['class' => 'form-control product-price', 'step' => 'any']) }}
        </div>
  
        <div class="row form-group">
          {{ Form::label('quantity', 'Quantity *', ['class' => 'col-sm-6 col-form-label']) }}
          {{ Form::number('qty', (empty($result) ? old('qty') : $result->qty) , ['class' => 'form-control', 'step' => 'any','onkeypress' =>'return onlyNumberKey(event)' ]) }}
        </div>
  
      </div>
      
      <div class="col-md-6">
        {{ Form::label('description', 'Description *', ['class' => 'col-sm-6 col-form-label']) }}
        {{ Form::textarea('description', (empty($result) ? old('description') : $result->description) , ['class' => 'form-control',   'id' => 'summernote']) }}
      </div>
    </div>

    <div class="row form-group">
      <label for="exampleInputFile">Cover Image</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="cover_image" class="custom-file-input-cover" id="exampleInputFileCover">
          <label class="custom-file-label" for="exampleInputFileCover">Choose file</label>
        </div>
      </div>
    </div>
  
    <div class="row card mb-4">
      <div class="image-preview-cover">
          @if(!empty($result))
            @foreach ($result->getMedia('product_cover_image') as $image)
              <img src="{{ $image->getUrl() }}" style = "width:300px; height:200px;">
            @endforeach
          @endif
      </div>
    </div>
  
    <div class="row form-group">
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
          @if(!empty($result))
            @foreach ($result->getMedia('product_images') as $image)
              <img src="{{ $image->getUrl() }}" style = "width:300px; height:200px;">
            @endforeach
          @endif
      </div>
    </div>
  
    <!-- Current Users Id in the form text-->
    <input type="hidden" name="users_id" value={{ $selectLookups['users_id'] }}>
    <!-- Current Users Id in the form text-->
  
  </div>
  <!-- /.card-body -->
  
  <div class="card-footer">
    <button type="submit" class="btn btn-outline-primary">Submit</button>
    <a href="{{ route('vendor_product.index') }}" class="btn btn-outline-danger"><b>Cancel</b></a>
  </div>
  <script>
    const regex = /[^\d.]|\.(?=.*\.)/g;
    const subst=``;
  
    $('.product-price').keypress(function(){
      const str=this.value;
      const result = str.replace(regex, subst);
      this.value=result;
    });
  
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
  </script>