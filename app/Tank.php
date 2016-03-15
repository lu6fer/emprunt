<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tank
 * @package Emprunt
 */
class Tank extends Model
{
    /**
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

    /**
     * @var array
     */
    protected $casts = [
        'borrowable'         => 'boolean',
        'number'             => 'integer',
        'test_pressure'      => 'integer',
        'operating_pressure' => 'integer',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'number', 'borrowable', 'brand', 'model',
        'size', 'sn_valve', 'sn_cylinder', 'test_pressure',
        'operating_pressure', 'usage', 'owner', 'status'
    ];

    /**
     * @return $this
     */
    public function users() {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank_owner() {
        return $this->belongsTo('Emprunt\User', 'owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank_status() {
        return $this->belongsTo('Emprunt\Status', 'status', 'id');
    }
}
