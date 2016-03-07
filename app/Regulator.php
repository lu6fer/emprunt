<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Regulator extends Model
{
    protected $dateFormat = 'd/m/Y';

    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }
}
