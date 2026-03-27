<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePayment extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

     public function payments()
     {
         return $this->hasMany(Payment::class, 'payment_type_id');
     }
}
