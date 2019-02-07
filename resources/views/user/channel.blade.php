@extends('layouts.app')

@section('content')

<div class="container">

<h4>Canal De {{$user->name}} </h4>
@include('video.videoslist');
</div>

@endsection




