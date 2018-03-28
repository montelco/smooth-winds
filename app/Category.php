<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'id',
        'name',
    ];
    protected $appends = [
        'FriendlyTime'
    ];

    public function getFriendlyTimeAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
    public function articles()
    {
        return $this->morphedByMany('App\Category', 'categories_articles');
    }
}
