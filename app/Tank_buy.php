<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tank_buy extends Model
{
    /**
     * @var string
     */
    //protected $dateFormat = 'd/m/Y';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank() {
        return $this->belongsTo('Emprunt\Tank');
    }
}
