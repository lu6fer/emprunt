<?php

namespace Emprunt;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dateFormat = 'd/m/Y';

    public function regulators () {
        return $this->belongsToMany('Emprunt\Regulator')->withPivot('borrow_date');

    }

    public function stabs () {
        return $this->belongsToMany('Emprunt\Stab')->withPivot('borrow_date');
    }

    public function tanks () {
        return $this->belongsToMany('Emprunt\Tank')->withPivot('borrow_date');
    }

    public function own_tanks () {
        return $this->hasMany('Emprunt\Tank', 'owner');
    }
}
