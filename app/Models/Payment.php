<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'fiscal_name',
        'tax_number',
        'payment_type_id',
        'payment_state_id',
        'document_number',
        'total_amount',
        'issue_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(TypePayment::class, 'payment_type_id');
    }

    public function paymentState()
    {
        return $this->belongsTo(StatePayment::class, 'payment_state_id');
    }

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class, 'enrollment_payment');
    }
}
