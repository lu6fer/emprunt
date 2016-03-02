<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Regulator extends Model
{
    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow', 'return');
    }
}
