<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $dateFormat = 'd/m/Y';

    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }

    public function owner () {
        return $this->belongsTo('Emprunt\User', 'owner');
    }
}
