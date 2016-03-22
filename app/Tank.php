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
        'operating_pressure', 'usage', 'owner_id', 'status_id'
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
    public function owner() {
        return $this->belongsTo('Emprunt\User', 'owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status() {
        return $this->belongsTo('Emprunt\Status', 'status_id', 'id');
    }

    public function tivs() {
        return $this->hasMany('Emprunt\Tiv')->orderBy('review_date', 'desc');
    }
}
