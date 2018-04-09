<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Article extends Model
{
    protected $table = 'categories_articles';

    public function article()
    {
    	$this->belongsTo('\App\Article');
    }
    public function user()
    {
    	$this->belongsTo('\App\User');
    }
    public function categories()
    {
    	$this->hasMany('\App\Category');
    }
}
