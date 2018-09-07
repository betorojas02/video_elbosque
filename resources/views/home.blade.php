 @extends('layouts.app') 
 @section('content') {{-- @if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{session('message')}}</strong>
</div>
@endif --}}
<div class="container">


    @include('video.videoslist')

</div>
@endsection