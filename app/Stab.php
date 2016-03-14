<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stab
 * @package Emprunt
 */
class Stab extends Model
{
    /**
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

    /**
     * @return $this
     */
    public function users ()
    {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stab_status() {
        return $this->belongsTo('Emprunt\Status', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stab_owner() {
        return $this->belongsTo('Emprunt\User', 'owner');
    }
}
