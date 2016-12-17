<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;

    protected $guarded = [];

    protected $casts = [
        'tags' => 'json',
    ];
}
