<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Uuids;

    protected $fillable = [
        'journals_uuid',
        'title',
        'pages',
        'publication_date'
    ];

    public $incrementing = false;

    public function getFriendlyTimeAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

}
