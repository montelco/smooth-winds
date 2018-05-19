<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
	protected $fillable = [
        'article_id',
        'user_id',
        'evidence',
        'notes',
        'positivity',
    ];

    protected $table = 'evidences';

    public function users()
    {
        return $this->belongsTo('\App\User');
    }

    public function articles()
    {
        return $this->belongsTo('\App\Article');
    }
}
