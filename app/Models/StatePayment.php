<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatePayment extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_state_id');
    }
}
