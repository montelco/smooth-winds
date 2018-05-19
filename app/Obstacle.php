<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obstacle extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'obstacle',
        'notes',
        'positivity',
    ];

    public function users()
    {
        return $this->belongsTo('\App\User');
    }

    public function articles()
    {
        return $this->belongsTo('\App\Article');
    }
}
