<?php

namespace App;



use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';
    //Relacion Muchos to One
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function video()
    {
        return $this->belongsTo('App\Video','video_id');
    }
}
