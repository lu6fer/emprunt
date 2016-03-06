<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Stab extends Model
{
    protected $dateFormat = 'd/m/Y';

    public function users ()
    {
        return $this->belongsToMany('Emprunt\User')
            //->withPivot('borrow', 'return')
            ->whereNull('stab_user.deleted_at')
            ->withTimestamps();
    }
}
