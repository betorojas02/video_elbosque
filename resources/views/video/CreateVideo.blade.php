@extends('layouts.app')
@section('content')
    
<style>
    input[type=file]{
        float:left;
    }
</style>


<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-10">
                <h1>Subir Video</h1>
            <form action="{{ url('/guardar-video')}}" method="post" enctype="multipart/form-data" class="dropzone"
            id="my-awesome-dropzone">
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

                <div class="md-form">
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                <label for="title">Titulo</label>
            </div>
                {{--  <div class="form-group">
                  <label for="title">Titulo</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" >
                </div>  --}}

                <div class="md-form">
                        <textarea type="text"  name="description" id="description" class="form-control md-textarea" rows="3">{{old('description')}}</textarea>
                        <label for="description">Descripcion</label>
                </div>
                {{--  <div class="form-group">
                  <label for="description">Descripcion</label>
                  <textarea name="description" id="description" class="form-control"  >{{old('description')}}</textarea>
                </div>  --}}

                <div class="container">
                    <div class="row">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Imagen </span><span class="fileinput-exists">Change</span><input type="file" name="image" id="image"></span>
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                    </div>
                </div>
               
               

{{--  
                <div class="form-group">
                    <label for="image">Miniatura</label>
                   <input type="file" name="image" id="image" class="form-control">
                  </div>  --}}
                {{--  <div class="form-group">    
                    <label for="video">Archivo del video</label>
                   <input type="file" name="video" id="video" class="form-control">
                  </div>    --}}
                 

                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Video </span><span class="fileinput-exists">Change</span><input type="file"  name="video" id="video" ></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                  </div>

                  

               
                 
                 
                 <hr>
                 <button type="submit" class="btn btn-success btn-rounded btn-lg">Subir Video</button>
            
            </form>

          
        </div>

    </div>
</div>



@endsection
