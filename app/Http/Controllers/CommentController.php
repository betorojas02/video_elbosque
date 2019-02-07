<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use TJGazel\Toastr\Facades\Toastr;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment();
        $user = \Auth::user();
        $comment->user_id = $user->id;
        $comment->video_id = $request->input('video_id');
        $comment->body = $request->input('body');
        $comment->save();
        Toastr::success('Comentario añadido correctamente');
        return redirect()->route('detalleVideo', ['slug' => $comment->video->id]);
       
    }

    public function delete($comment_id)
    {
        $user = \Auth::user();
        $comment = Comment::find($comment_id);
        if ($user && ($comment->user_id == $user->id || $comment->video->user_id == $user->id)) {
            $comment->delete();

        }
        Toastr::warning('Comentario eliminado correctamente');
        return redirect()->route('detalleVideo', ['slug' => $comment->video->id]);
    }
}