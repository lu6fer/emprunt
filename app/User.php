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
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function regulators () {
        return $this->belongsToMany('Emprunt\Regulator')->withPivot('borrow', 'return');
    }

    public function stabs () {
        return $this->belongsToMany('Emprunt\Stab')->withPivot('borrow', 'return');
    }

    public function blocks () {
        return $this->belongsToMany('Emprunt\Block')->withPivot('borrow', 'return');
    }
}
