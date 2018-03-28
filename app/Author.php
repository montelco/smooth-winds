<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'id',
        'family_name',
        'given_name',
        'article_id'
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
        return $this->belongsTo('\App\Article', 'article_id');
    }
}
