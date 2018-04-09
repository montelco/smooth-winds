<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

	use SoftDeletes;

	protected $appends = [
		'FriendlyTime'
	];

	protected $dates = ['deleted_at'];

    protected $fillable = [
    	'user_id',
    	'article_id',
    	'body'
    ];

    public function getFriendlyTimeAttribute()
    {
    	return $this->updated_at->diffForHumans();
    }

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function article()
    {
    	return $this->belongsTo('\App\Article');
    }
}
