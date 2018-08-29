@extends('layouts.app')

@section('content')
<link href="{{ asset('css/cardvideo.css') }}" rel="stylesheet">
<div class="container">
    

    <div class="row  justify-content-md-center">

        <div class="col-md-10">
            <h2>{{$video->title}}</h2>
            <span class="header-line gradient-color-2"></span>
            <br>
            <div class="col-md-12">
                        <div class="embed-responsive embed-responsive-16by9 hoverable">
                                <video id="video-player" src="{{ route('fileVideo', ['filename' => $video->video_path])}}" controls>
                                        Tu navegador no es compatible con HTML5
                                    </video> 
                              </div>

                                <br>
                                <!-- description-->
                           

                              <div class="card text-white bg-success mb-3" >
                                    <div class="card-header">Subido por <strong>{{$video->user->name. " " . $video->user->surname}}</strong> {{\FormatTime::LongTimeFilter($video->created_at)}}</div>
                                    <div class="card-body">
                                      <h5 class="card-title">Descripcion</h5>
                                      <p class="card-text">{{$video->description}}</p>
                                    </div>

                                </div>
                              <!-- Comentarios-->
                             
                                @include('video.comentarios') 
                            
                           

                </div>
            </div>   
        </div>
    </div>
@endsection