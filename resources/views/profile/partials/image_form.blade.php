<form method="post" action="{{ route('profile_upload',$result['user']->id) }}" enctype="multipart/form-data" multiple="multiple" class="dropzone" id="dropzone">
    @method('PUT')
    @csrf
</form> 
