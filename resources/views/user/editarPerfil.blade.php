@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-10">
        <h1>Editar su perfil </h1>
            <form action="{{ route('perfilUpdate', ['user_id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data">
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
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                </div>  --}}
                <div class="md-form ">
                    <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                    <label for="name">Nombre</label>
                </div>

                
                {{--  <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="text" name="email" id="email"  class="form-control" value = "{{Auth::user()->email}}">
                </div>  --}}
                <div class="md-form">
                <input type="text" name="email" id="email"  class="form-control" value = "{{Auth::user()->email}}">
                    <label for="email">Correo electrónico nuevo </label>
                </div>
                {{--  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" id="password"  class="form-control" value = "{{Auth::user()->password}}">
                </div>  --}}
                 
                <div class="md-form">
                <input type="text" name="password" id="password"  class="form-control" value = "">
                    <label for="password">Contraseña nueva  </label>
                </div>
                <div class="form-group">
                    <label for="image">Foto de perfil</label>
                    @if(Storage::disk('images')->has(Auth::user()->image))
                    <div class="col-md-4">
                        <div class="user-image-mask" >
                            <img src="{{url('/mini/'.Auth::user()->image)}}" class="img-fluid img-thumbnail " >
                        </div>
                    </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                 <button type="submit" class="btn btn-info">Editar perfil</button>
            </form>
            </div>
            </div>
            </div>

@endsection
