<?php

namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Post extends SleepingOwlModel
{
    protected $fillable = array('title', 'text', 'user_id','created_at','updated_at' );

    /**
     * Show a list of all available posts.
     *
     * @return Response
     */

    /**
     * Create a new flight instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Валидируем запрос...


    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function getList()
    {
        return static::lists('title', 'id') -> all();
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
