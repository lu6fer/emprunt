<?php

namespace Emprunt;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package Emprunt
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'email', 'password',
        'phone_fix', 'phone_mob', 'phone_work', 'licence',
        'active', 'stab', 'regulator', 'tank'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var string
     */
    protected $dateFormat = 'd/m/Y';

    /**
     * @var array
     */
    protected $casts = [
        'active'    => 'boolean',
        'tank'      => 'boolean',
        'stab'      => 'boolean',
        'regulator' => 'boolean',
    ];

    /**
     * @return $this
     */
    public function regulators() {
        return $this->belongsToMany('Emprunt\Regulator')->withPivot('borrow_date');

    }

    /**
     * @return $this
     */
    public function stabs() {
        return $this->belongsToMany('Emprunt\Stab')->withPivot('borrow_date');
    }

    /**
     * @return $this
     */
    public function tanks() {
        return $this->belongsToMany('Emprunt\Tank')->withPivot('borrow_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personal_tanks() {
        return $this->hasMany('Emprunt\Tank', 'owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personal_regulators() {
        return $this->hasMany('Emprunt\Regulator', 'owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personal_stabs() {
        return $this->hasMany('Emprunt\Stab', 'owner');
    }
}
