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
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @var array
     */
    protected $casts = [
        'borrowable'         => 'boolean',
        'number'             => 'integer'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'number', 'borrowable', 'brand', 'model',
        'type', 'sn_stage_1', 'sn_stage_2',
        'sn_stage_octo', 'usage', 'owner_id', 'status_id'
    ];

    /**
     * @var array
     */
    protected $with = [
        'status', 'buy'
    ];

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
        return $this->belongsTo('Emprunt\Status', 'status_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner() {
        return $this->belongsTo('Emprunt\User', 'owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function buy() {
        return $this->hasOne('Emprunt\Regulator_buy');
    }
}
