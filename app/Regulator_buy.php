<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Regulator_buy extends Model
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
        'tank_id', 'date', 'price', 'shop', 'sell_price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regulator() {
        return $this->belongsTo('Emprunt\Regulator');
    }
}
