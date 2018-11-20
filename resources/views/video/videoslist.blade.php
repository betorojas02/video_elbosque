@if (count($videos) >= 1) 
    @foreach ($videos as $video)
    <div class="video-item col-md-12 ">
        <div class="row">

            <!-- Grid column -->
            <div class="col-lg-5">
                <!-- Featured image -->
                @if(Storage::disk('images')->has($video->image))
                <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                    <img class="img-fluid" src="{{url('/mini/'.$video->image)}}" alt="Sample image">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                @endif

            </div>
            <!-- Grid column -->

            <!-- Grid column -->

            <div class="col-lg-7">
                <!-- Category -->
              
                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong><a class="video-title" href="{{ route('detalleVideo',['id' => $video->id])}}">{{$video->title}}</a></strong></h4>


                <!-- Excerpt -->
                <p>{{$video->description}}</p>
                <!-- Post data -->
                <p>Por : <a href="{{route('channel',['slug'=>$video->user->slug])}}">{{$video->user->name." ". $video->user->surname}}</a></p>
                <!-- Read more button -->



                <!--configuracion de botones -->
                <div class="col-md-8">
                    <a href="{{ route('detalleVideo',['id' => $video->id])}}" class="btn btn-success btn-md">Ver</a>
                    @if (Auth::check() && Auth::user()->id == $video->user->id)

                    <a href="{{ route('videoEdit',['slug' => $video->slug])}}" class="btn btn-warning btn-md">Editar</a>

                    <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                    <a href="#video{{$video->id}}" role="button" class="btn btn-danger btn-md" data-toggle="modal">Eliminar
                        video
                    </a>
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
            <!-- Grid column -->

        </div>
        <hr class="my-5">

        <!-- botones de accion-->

    </div>
    @endforeach @else
    <div class="alert alert-warning" role="alert">
        <strong>No se ha encontro videos relacionados</strong>
    </div>
    @endif

    
<div class="container">
    <div class="row  justify-content-md-center">

        <center>
            {{$videos->links()}}
        </center>
    </div>
</div>