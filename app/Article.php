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

    public function categories()
    {
        return $this->hasMany('App\Category_Article', 'article_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
}
