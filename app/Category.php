<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'category_type'
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
        return $this->belongsToMany('\App\Article', 'categories_articles', 'article_id', 'category_id');
    }
    public function objects()
    {
        return $this->belongsToMany('\App\Category_Article', 'id');
    }
}
