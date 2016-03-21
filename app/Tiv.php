<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tiv extends Model
{
    public function tank() {
        return $this->belongsTo('Emprunt\Tank');
    }

    public function valve_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'valve');
    }
    public function ext_state_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'ext_state');
    }
    public function int_residue_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'int_residue');
    }
    public function int_state_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'int_state');
    }
    public function neck_thread_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'neck_thread');
    }
    public function neck_thread_size_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'neck_thread_size');
    }
    public function performed_maintenance_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'performed_maintenance');
    }
    public function review_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'review');
    }
    public function review_status_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'review_status');
    }
    public function todo_maintenance_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'todo_maintenance');
    }
    public function valve_ring_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve')->where('type', 'valve_ring');
    }
}
