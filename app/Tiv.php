<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tiv extends Model
{
    protected $with = [
        'valve', 'ext_state', 'int_residue',
        'int_state', 'neck_thread', 'neck_thread_size',
        'performed_maintenance', 'review', 'review_status',
        'todo_maintenance', 'valve_ring'
    ];

    protected $fillable = [
        'tank_id', 'review_id', 'reviewer_id', 'review_date',
        'previous_review_date', 'next_test_date', 'review_status_id',
        'shipping_date', 'valve_id', 'valve_ring_id', 'neck_thread_id',
        'neck_thread_size_id', 'ext_state_id', 'int_state_id', 'int_oil',
        'int_residue_id', 'todo_maintenance_id', 'performed_maintenance_id',
        'comment'
    ];

    
    public function tank() {
        return $this->belongsTo('Emprunt\Tank');
    }

    public function valve() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve_id')->where('type', 'valve');
    }
    public function ext_state() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'ext_state_id')->where('type', 'ext_state');
    }
    public function int_residue() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'int_residue_id')->where('type', 'int_residue');
    }
    public function int_state() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'int_state_id')->where('type', 'int_state');
    }
    public function neck_thread() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'neck_thread_id')->where('type', 'neck_thread');
    }
    public function neck_thread_size() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'neck_thread_size_id')->where('type', 'neck_thread_size');
    }
    public function performed_maintenance() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'performed_maintenance_id')->where('type', 'performed_maintenance');
    }
    public function review() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'review_id')->where('type', 'review');
    }
    public function review_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'review_status_id')->where('type', 'review_status');
    }
    public function todo_maintenance() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'todo_maintenance_id')->where('type', 'todo_maintenance');
    }
    public function valve_ring() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve_ring_id')->where('type', 'valve_ring');
    }
}
