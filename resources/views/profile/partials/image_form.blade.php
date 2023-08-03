@php $imgUrl = $result['user']->getFirstMediaUrl('profile_pictures','thumb') @endphp
<img class="profile-user-img img-fluid img-circle" src="{{ empty($imgUrl) ? "../../dist/img/user4-128x128.jpg": $imgUrl }}" alt="User profile picture">

<form method="post" action="{{ route('profile_upload',$result['user']->id) }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
    @method('PUT')
    @csrf
</form> 