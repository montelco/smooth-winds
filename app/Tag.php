<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'pivot'
    ];

    public function users()
    {
        return $this->belongsToMany('\App\User', 'article_tag_user');
    }

    public function articles()
    {
        return $this->belongsToMany('\App\Article', 'article_tag_user');
    }
}
