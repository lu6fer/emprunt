<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow', 'return');
    }
}
