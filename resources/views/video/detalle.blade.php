@extends('layouts.app')

@section('content')
<link href="{{ asset('css/cardvideo.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    

    <div class="row  justify-content-md-center">

        <div class="col-md-10">
            <h2>{{$video->title}}</h2>
            <span class="header-line gradient-color-2"></span>
            <br>
            
                        <div class="embed-responsive embed-responsive-16by9 hoverable">
                                <video id="video-player" src="{{ route('fileVideo', ['filename' => $video->video_path])}}" controls>
                                        Tu navegador no es compatible con HTML5
                                    </video> 
                              </div>

                                <br>
                                <!-- description-->
                                <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>


                                 <button id="click" type="button" class="btn btn-default">LIKE <i class="fa fa-heart"> </i></button>
                                 <div id="output" class="btn btn-default" > 0</div>

                                 

                                 
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

     
     <script>
$(function() {
  var count = 0, countRate = 0, output = $('#output');

  setInterval(function(){ output.html(count) }, 1); // update continually

  $('#click').click(function(){ count += 1 });
  $('#autoClick').click(function(){ countRate += 1 });
});

 Route::post('like', function(){
if(Request::ajax()){

  $userid= Input::get('user_id');
  $videoid = Input::get('video_id');
  $contador= Input::get($contador1);
  });
</script>
@endsection