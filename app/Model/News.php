<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function isValid () {
        return !(is_null($this->content) || is_null($this->title) || is_null($this->image));
    }
}
