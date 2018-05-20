<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name','type'
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
