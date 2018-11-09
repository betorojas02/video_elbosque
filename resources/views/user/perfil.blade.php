@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">
<div class="col-md-4"> 
<i class ="fa fa-edit"> </i>

<a href=""> <i class ="fa fa-edit"> </i> </a>


<h4> {{$user->name}} </h4>

{{$user->surname}} 

{{$user->email}}



</div>

<div class="col-md-8"> 

@include('video.videoslist');
</div>
</div>
</div>

@endsection

