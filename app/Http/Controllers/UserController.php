<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str as Str;
use App\User;
use App\Video;
use App\Comment;

class UserController extends Controller
{
    //
    public function channel($slug){
        $user = User::where('slug','=', $slug)->first();
        if(!is_object($user)){
            return redirect()->route('home');
        }

        $video = Video::Where('user_id','=',$user->id)->paginate(5);
             // dd($video);   
        return view('user.channel',array(
            'user' => $user,
            "videos"=> $video
        ));
    }

    public function Perfil ($slug)
    {
      //  $user = \Auth::User();

        $user = User::where('slug','=', $slug)->first();
        $video = Video::Where('user_id','=',$user->id)->paginate(5);
        return view ('user.perfil', array( 'user' => $user,  "videos"=> $video));


    }

}

