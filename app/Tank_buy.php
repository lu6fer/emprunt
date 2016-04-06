<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tank_buy extends Model
{
    /**
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @var array
     */
    protected $dates = [
        'date', 'created_at', 'updated_at'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'tank_id', 'maker', 'thread_type',
        'date', 'price', 'shop', 'sell_price',
    ];

    /**
     * Mutator for nullable date
     * @param $timestamp
     * @return \Carbon\Carbon|null
     */
    public function getDateAttribute($timestamp)
    {
        return ( ! starts_with($timestamp, '0000')) ?$this->asDateTime($timestamp) : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank() {
        return $this->belongsTo('Emprunt\Tank');
    }
}
