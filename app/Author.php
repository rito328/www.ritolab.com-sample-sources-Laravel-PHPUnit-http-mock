<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
