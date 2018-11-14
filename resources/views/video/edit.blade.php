@extends('layouts.app') 
@section('content')

<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-10">
            <h1>Editar {{$video->title}}</h1>
            <form action="{{ route('videoUpdate', method="post" enctype="multipart/form-data">
                @csrf
                 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{--  <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$video->title}}">
                </div>  --}}
                <div class="md-form ">
                    <input type="text" name="title" id="title" class="form-control" value="{{$video->title}}">
                    <label for="title">Titulo</label>
                </div>
                {{--  <div class="form-group">
                    <label for="description">Descripcion</label>
                    <textarea name="description" id="description" class="form-control">{{$video->description}}</textarea>
                </div>  --}}
                <div class="md-form">
                    <textarea   name="description" id="description"  class="form-control md-textarea" rows="3">{{$video->description}}</textarea>
                    <label for="description">Descripcion</label>
                </div>
                <div class="form-group">
                    <label for="image">Miniatura</label>
                    @if(Storage::disk('images')->has($video->image))
                    <div class="col-md-4">
                        <div class="video-image-mask">
                            <img src="{{url('/mini/'.$video->image)}}" class="img-fluid img-thumbnail ">
                        </div>
                    </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">

                    <label for="video">Archivo del video</label>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="video-player" src="{{ route('fileVideo', ['filename' => $video->video_path])}}" controls>
                            Tu navegador no es compatible con HTML5
                        </video>
                    </div>
                    <input type="file" name="video" id="video" class="form-control">
                </div>


                <hr>
                <button type="submit" class="btn btn-info">Editar Video</button>
            </form>


        </div>

    </div>
</div>
@endsection