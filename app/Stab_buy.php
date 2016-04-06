<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Stab_buy extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stab() {
        return $this->belongsTo('Emprunt\Stab');
    }
}
