<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

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
        return $this->morphToMany('App\Category', 'categories_articles');
    }
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
