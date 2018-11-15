<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request)
    {
       

        $likes = new likes();
        $user = \Auth::user();
       
        $likes->user_id = $user->id;
        $likes->video_id = $request->input('video_id');
        $likes->save();
        Toastr::success('Like aÃ±adido Correctamente');
        return redirect()->route('detalleVideo', ['slug' => $likes->video->slug]);
       
    }

}
