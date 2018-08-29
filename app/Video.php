<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  
    protected $table = 'videos';

    // relacion One to Many

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    //Relacion Muchos to One
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

   
    
    /**
    * Este es el método el cual nos indica el trait y esperamos devolver 
    * un objeto SlugOptions.
    */

}
