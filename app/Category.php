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
        return $this->belongsToMany('\App\Article');
    }
    public function users()
    {
        return $this->belongsToMany('\App\User');
    }
}
