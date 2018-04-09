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
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('\App\Article');
    }

    public function categories_articles()
    {
        return $this->hasMany('\App\Category_Article');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
}
