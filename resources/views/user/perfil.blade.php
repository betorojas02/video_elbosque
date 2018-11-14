@extends('layouts.app')

@section('content')


<div class="container">

<div class="row">
<div class="col-md-4"> 
<a href="{{ route ('editarPerfil',['slug'=> Auth::user()->slug ])}}">{{__('Editar perfil')}} <i class ="fa fa-edit"> </i> </a>


<h5> {{$user->name}} </h5>

{{$user->surname}} 

{{$user->email}}

<h5><label for="image">Foto de perfil</label></h4>
                    @if(Storage::disk('images')->has(Auth::user()->image))
                    <div class="col-md-12">
                        <div class="user-image-mask" >
                            <img src="{{url('/mini/'.Auth::user()->image)}}" class="img-fluid img-thumbnail " style="
    height: 220px;
    width: 270px;
">
                        </div>
                    </div>
                    @endif


</div>

<div class="col-md-8"> 

@include('video.videoslist');
</div>
</div>
</div>

@endsection

