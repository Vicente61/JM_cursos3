<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'training_id',
        'enrollment_state_id',
        'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    protected $attributes = [
        'enrollment_state_id' => 1,
        'is_completed' => false,
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }

    public function enrollmentState(): BelongsTo
    {
        return $this->belongsTo(StateEnrollment::class, 'enrollment_state_id');
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class, 'enrollment_payment');
    }
}
