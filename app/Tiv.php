<?php

namespace Emprunt;

use Illuminate\Database\Eloquent\Model;

class Tiv extends Model
{
    /**
     * @var array
     */
    protected $with = [
        'valve', 'ext_state', 'int_residue',
        'int_state', 'neck_thread', 'neck_thread_size',
        'performed_maintenance', 'review', 'review_status',
        'todo_maintenance', 'valve_ring', 'recipient', 'reviewer'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'tank_id', 'review_id', 'reviewer_id', 'review_date',
        'previous_review_date', 'next_test_date', 'review_status_id',
        'shipping_date', 'valve_id', 'valve_ring_id', 'neck_thread_id',
        'neck_thread_size_id', 'ext_state_id', 'int_state_id', 'int_oil',
        'int_residue_id', 'todo_maintenance_id', 'performed_maintenance_id',
        'comment', 'recipient_id'
    ];

    
    protected $dates = [
        'created_at', 'updated_at',
        'review_date', 'previous_review_date',
        'next_test_date', 'shipping_date'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @var array
     */
    protected $casts = [
        'int_oil' => 'boolean',
    ];


    /**
     * Mutator for todo_maintenance
     *  Transform empty value to null
     * @param $value
     */
    public function setTodoMaintenanceIdAttribute($value) {
        $this->attributes['todo_maintenance_id'] = ($value) ? $value : null;
    }

    /**
     * Mutator for performed_maintenance
     *  Transform empty value to null
     * @param $value
     */
    public function setPerformedMaintenanceIdAttribute($value) {
        $this->attributes['performed_maintenance_id'] = ($value) ? $value : null;
    }

    /**
     * Mutator for performed_maintenance
     *  Transform empty value to null
     * @param $value
     */
    public function setRecipientIdAttribute($value) {
        $this->attributes['recipient_id'] = ($value) ? $value : null;
    }

    /**
     * Mutator for nullable date
     * @param $timestamp
     * @return \Carbon\Carbon|null
     */
    public function getPreviousReviewDateAttribute($timestamp)
    {
        // flexible:
        return ( ! starts_with($timestamp, '0000')) ? $timestamp : null;
        // or explicit:
        //return ($timestamp !== '0000-00-00 00:00:00') ? $this->asDateTime($timestamp) : null;
    }

    /**
     * Mutator for nullable date
     * @param $timestamp
     * @return \Carbon\Carbon|null
     */
    public function getShippingDateAttribute($timestamp)
    {
        // flexible:
        return ( ! starts_with($timestamp, '0000')) ? $timestamp : null;
        // or explicit:
        //return ($timestamp !== '0000-00-00 00:00:00') ? $this->asDateTime($timestamp) : null;
    }


    /**
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tank() {
        return $this->belongsTo('Emprunt\Tank');
    }

    /**
     * @return mixed
     */
    public function valve() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve_id')->where('type', 'valve');
    }

    /**
     * @return mixed
     */
    public function ext_state() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'ext_state_id')->where('type', 'ext_state');
    }

    /**
     * @return mixed
     */
    public function int_residue() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'int_residue_id')->where('type', 'int_residue');
    }

    /**
     * @return mixed
     */
    public function int_state() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'int_state_id')->where('type', 'int_state');
    }

    /**
     * @return mixed
     */
    public function neck_thread() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'neck_thread_id')->where('type', 'neck_thread');
    }

    /**
     * @return mixed
     */
    public function neck_thread_size() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'neck_thread_size_id')->where('type', 'neck_thread_size');
    }

    /**
     * @return mixed
     */
    public function performed_maintenance() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'performed_maintenance_id')->where('type', 'performed_maintenance');
    }

    /**
     * @return mixed
     */
    public function review() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'review_id')->where('type', 'review');
    }

    /**
     * @return mixed
     */
    public function review_status() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'review_status_id')->where('type', 'review_status');
    }

    /**
     * @return mixed
     */
    public function todo_maintenance() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'todo_maintenance_id')->where('type', 'todo_maintenance');
    }

    /**
     * @return mixed
     */
    public function valve_ring() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'valve_ring_id')->where('type', 'valve_ring');
    }

    /**
     * @return mixed
     */
    public function recipient() {
        return $this->hasOne('Emprunt\Tiv_status', 'id', 'recipient_id')->where('type', 'recipient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reviewer() {
        return $this->hasOne('Emprunt\User', 'id', 'reviewer_id');
    }
}
