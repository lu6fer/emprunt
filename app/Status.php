<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package Emprunt
 */
class Status extends Model
{
    /**
     * @var array
     */
    protected $fillable = [ 'status' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanks() {
        return $this->hasOne('Emprunt\Tank', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regulators() {
        return $this->hasOne('Emprunt\Regulator', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stabs() {
        return $this->hasOne('Emprunt\Stab', 'status');
    }
}
