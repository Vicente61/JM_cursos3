<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateEnrollment extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

     public function enrollments()
     { return $this->hasMany (Enrollment::class ,'state_enrollment_id'); }
}
