<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Regulator_buy extends Model
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
        'buy_date', 'buy_price', 'shop', 'sell_price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regulator() {
        return $this->belongsTo('Emprunt\Regulator');
    }
}
