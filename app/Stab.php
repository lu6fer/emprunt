<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Stab extends Model
{
    protected $dateFormat = 'd/m/Y';

    public function users ()
    {
        return $this->belongsToMany('Emprunt\User')->withPivot('borrow', 'return')->withTimestamps();
    }

    public function availableItems()
    {
        $ids = DB::table('stab_user')->where('user_id', '=', $this->id)->lists('user_id');
        return Item::whereNotIn('id', $ids)->get();
    }
}
