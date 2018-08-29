@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
      <div class="container">

          @if (session('message'))
          <div class="alert alert-success" role="alert">
              <strong>{{session('message')}}</strong>
          </div>
          @endif
          <ul id="videos-list">
              @if (count($videos) >= 1)
                  
        
              @foreach ($videos as $video)
              <div class="video-item col-md-12 ">
                  <div class="card border-success mb-3">
                      <div class="card-body">
                          <div class="container">
                              <div class="row">
                                  <!-- imagen video-->
                                  @if(Storage::disk('images')->has($video->image))
                                  <div class="col-md-4">
                                      <div class="video-image-mask">
                                          <img src="{{url('/mini/'.$video->image)}}" class="img-fluid img-thumbnail float-left">
                                      </div>
                                  </div>
                                  @endif
                                  <div class="col-md-8">
                                      <div class="data">
                                          <h4><a class="video-title" href="{{ route('detalleVideo',['video_id' => $video->id])}}">{{$video->title}}</a></h4>
                                          <p>{{$video->user->name." ". $video->user->surname}}</p>
                                      </div>
                                  </div>


                                  <!--configuracion de botones -->
                                  <div class="col-md-8">
                                      <a type="button" href="{{ route('detalleVideo',['video_id' => $video->id])}}" class="btn btn-success">Ver</a>
                                      @if (Auth::check() && Auth::user()->id == $video->user->id)

                                      <a type="button" href="{{ route('videoEdit',['video_id' => $video->id])}}" class="btn btn-warning">Editar</a>

                                      <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                                      <a href="#video{{$video->id}}" role="button" class="btn btn-danger" data-toggle="modal">Eliminar
                                          video</a>
                                      <!-- Modal / Ventana / Overlay en HTML -->
                                      <div id="video{{$video->id}}" class="modal fade">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      <h4 class="modal-title">¿Estás seguro?</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p>¿Seguro que quieres borrar este video?</p>
                                                      <p class="text-warning"><small>
                                                              {{$video->title}} Si lo borras, nunca podrás recuperarlo.</small></p>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                      <a href="{{ url('/delete-video/'.$video->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      @endif
                                  </div>
                              </div>
                          </div>

                          <!-- botones de accion-->
                      </div>
                  </div>
              </div>
              @endforeach
              @else
                  <div class="alert alert-warning" role="alert">
                      <strong>No se ha encontro videos relacionados</strong>
                  </div>
              @endif
              
          </ul>

      </div>
      <div class="container">
          <div class="row  justify-content-md-center">

              <center>
                  {{$videos->links()}}
              </center>
          </div>
      </div>

  </div>
</div>
@endsection