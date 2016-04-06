<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Borrow_history
 * @package Emprunt
 */
class Borrow_history extends Model
{
    /**
     * Force date format
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';
    /**
     * Disable timestamps
     * @var bool
     */
    public $timestamps = false;
}
