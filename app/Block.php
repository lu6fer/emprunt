<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $dateFormat = 'd/m/Y';

    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }
}
