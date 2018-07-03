<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'doi',
        'journal',
        'name',
        'page',
        'year',
        'month',
        'day',
        'user_id'
    ];

    // protected $hidden = [
    //     'pivot'
    // ];

    protected $appends = [
        'FriendlyTime'
    ];

    public function getFriendlyTimeAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
    
    public function authors()
    {
        return $this->hasMany('\App\Author');
    }

    public function obstacles()
    {
        return $this->hasMany('\App\Obstacle');
    }

    public function evidences()
    {
        return $this->hasMany('\App\Evidence');
    }

    public function atu()
    {
        return $this->hasMany('\App\ArticleTagUser');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag', 'article_tag_user')->withPivot('id');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User', 'article_tag_user');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }

}
