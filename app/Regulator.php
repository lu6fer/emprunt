<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Regulator
 * @package Emprunt
 */
class Regulator extends Model
{
    /**
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

    /**
     * @return $this
     */
    public function users () {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status() {
        return $this->belongsTo('Emprunt\Status', 'status');
    }
}
