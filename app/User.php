<?php

namespace App;

use App\Article;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    public function articles()
    {
        return $this->belongsToMany('\App\Article', 'article_tag_user');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

    public function obstacles()
    {
        return $this->hasMany('\App\Obstacle');
    }

    public function evidences()
    {
        return $this->hasMany('\App\Evidence');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag', 'article_tag_user');
    }
}
