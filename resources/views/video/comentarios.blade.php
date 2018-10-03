<hr> @if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{session('message')}}</strong>
</div>
@endif @if(Auth::check())
<h4>Comentarios</h4>
<form action="{{ url('/comment')}}" method="post">
    @csrf
    <input type="hidden" name="video_id" value="{{$video->id}}" required>

    {{--  <div class="form-group">

        <textarea name="body" id="description" class="form-control"></textarea>
    </div>  --}}

    <div class="md-form">
            <textarea  name="body"  id="description" class="md-textarea form-control" rows="3"></textarea>
            <label for="form10">Comentar</label>
    </div>
    <button type="submit" class="btn btn-outline-default btn-rounded waves-effect btn-lg">Comentar</button>
  
</form>
@endif @if(isset($video->comments))
<div class="card-header border-0 font-weight-bold">Tiene {{count($video->comments)}} Comentarios
</div>
@foreach ($video->comments as $comment)
<hr> {{-- camoentatios anteriores --}} {{--
<div class="card border-success">
    <div class="card-body text-success">
        <h5 class="card-title">{{$comment->user->name." ".$comment->user->surname}} {{\FormatTime::LongTimeFilter($comment->created_at)}}</h5>
        <p class="card-text">{{$comment->body}}</p>

        @if (Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))
        <div class="float-right">
            <!-- Botón en HTML (lanza el modal en Bootstrap) -->
            <a href="#comentario{{$comment->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar
                Comentario
            </a>
            <!-- Modal / Ventana / Overlay en HTML -->
            <div id="comentario{{$comment->id}}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">¿Estás seguro?</h4>
                        </div>
                        <div class="modal-body">
                            <p>¿Seguro que quieres borrar este elemento?</p>
                            <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <a href="{{ url('/delete-comment/'.$comment->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div> --}}
<!--Section: Comments-->
<section class="my-5">

    <!-- Card header -->

    <div class="media d-block d-md-flex mt-4">
        <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg"
            alt="Generic placeholder image" width="100" height="100">
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
            <h5 class="font-weight-bold mt-0">
                <a class="text-default" href="{{route('channel',['slug'=>$video->user->slug])}}">{{$comment->user->name." ".$comment->user->surname}} </a>{{\FormatTime::LongTimeFilter($comment->created_at)}}
                <a href="" class="pull-right text-default">
                    <i class="fa fa-reply"></i>
                </a>
            </h5>
            {{$comment->body}} @if (Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))
            <div class="float-right">
                <!-- Botón en HTML (lanza el modal en Bootstrap) -->
                <a href="#comentario{{$comment->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar
                    Comentario
                </a>
                <!-- Modal / Ventana / Overlay en HTML -->
                <div id="comentario{{$comment->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">¿Estás seguro?</h4>
                            </div>
                            <div class="modal-body">
                                <p>¿Seguro que quieres borrar este elemento?</p>
                                <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <a href="{{ url('/delete-comment/'.$comment->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</section>


@endforeach @endif