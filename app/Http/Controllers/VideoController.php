<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str as Str;
use App\Video;
use App\Comment;


class VideoController extends Controller
{
    //
    public function createVideo()
    {
        return view('video.CreateVideo');

    }

    public function saveVideo(Request $request)
    {
        $validateData = $this->validate($request, [
            'title' => 'required|min:5|max:255',
            'description' => 'required',
            'video' => 'mimes:mp4'
        ]);

        $video = new video();
        $user = \Auth::user();
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->slug = Str::slug($request->input('title'));

        // subida imagen
        $image = $request->file('image');
        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $video->image = $image_path;

        }   
            // subida del video
        $video_file = $request->file('video');
        if ($video_file) {
            $video_path = time() . $video_file->getClientOriginalName();
            \Storage::disk('videos')->put($video_path, \File::get($video_file));
            $video->video_path = $video_path;
        }
        $video->save();
        Toastr::success('El video se ha subido correctamente');
      
      

        // Session::flash('info','video');
        return redirect()->route('home');
        // ->with(array(
        //     "message" => 'El video se ha subido'
        // ));
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function getVideoPage($slug)
    {
      

        $video = Video::where('slug','=', $slug)->firstOrFail();
        Video::where('slug','=', $slug)->firstOrFail();
        return view('video.detalle', array(
            'video' => $video
        ));
    }
    public function getVideo($filename)
    {
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);

    }
    public function deletes($video_id)
    {
        $user = \Auth::user();
        $video = Video::find($video_id);
        $Comments = Comment::where('video_id', $video_id)->get()->each->delete();
        if ($user && $video->user_id == $user->id) {

            Storage::disk('images')->delete($video->image);
            Storage::disk('videos')->delete($video->video_path);

            $video->delete();
            Toastr::warning( 'Video Eliminado correctament');
          
        } else {
            Toastr::warning( 'Video no ha podido eliminarse correctamentet');
            
        }
        return redirect()->route('home');
    }
    public function edit($slug)
    {
        $user = \Auth::user(); \Auth::user();
        $video = Video::where('slug','=', $slug)->firstOrFail();
        if ($user && $video->user_id == $user->id) {          
           
        } else {
            Toastr::info( 'Video no ha podido ser modificado correctamente');
       
            return redirect()->route('home');
        }
        return view('video.edit', array(
            'video' => $video
        ));
    }

    public function update($video_id, Request $request)
    {
        //Validar fomulario
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'video' => 'mimes:mp4'
        ]);

        $user = \Auth::user();
        $video = Video::findOrFail($video_id);
        $video->user_id = $user->id;
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        
        // Subida de la miniatura
        $image = $request->file('image');
        if ($image) {
            // Delete image
            if ($video->image) {
                Storage::disk('images')->delete($video->image);
            }
            // Update image
            $image_path = time() . $image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));

            $video->image = $image_path;
        }
        
        // Subida de video
        $video_file = $request->file('video');
        if ($video_file) {
            // Delete video
            if ($video->image) {
                Storage::disk('videos')->delete($video->video_path);
            }
            // Update video
            $video_path = time() . $video_file->getClientOriginalName();
            Storage::disk('videos')->put($video_path, \File::get($video_file));

            $video->video_path = $video_path;
        }

        $video->update();

   
        Toastr::info( 'El video se ha actualizado correctamente');
        return redirect()->route('home');
    
    }

    public function search($search = null)
     {
         
        if(is_null($search)){
             $search = \Request::get('search');
             if(is_null($search)){
                 return redirect()->route('home');
             }
            return redirect()->route('videoSearch',array('search' =>$search));
        }
        $result = Video::where('title' , 'LIKE', '%'.$search.'%')->paginate(5);

        return view('video.search',array(
            'videos' => $result,
            'search' => $search
        ));
    }
}