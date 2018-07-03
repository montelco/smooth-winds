<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ArticleTagUser extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    protected $fillable = [
        'rating',
        'parent_id',
        'tag_id',
        'article_id',
        'user_id'
    ];

    protected $table = 'article_tag_user';

}
