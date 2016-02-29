<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    /**
     * @return $this
     */
    public function users () {
        return $this->belongsToMany('Emprunt\user')->withPivot('borrow', 'return');
    }

    /**
     * @return $this
     */
    public function regulators () {
        return $this->belongsToMany('Emprunt\regulator')->withPivot('borrow', 'return');
    }

    /**
     * @return $this
     */
    public function stabs () {
        return $this->belongsToMany('Emprunt\stab')->withPivot('borrow', 'return');
    }

    /**
     * @return $this
     */
    public function blocks () {
        return $this->belongsToMany('Emprunt\block')->withPivot('borrow', 'return');
    }
}
