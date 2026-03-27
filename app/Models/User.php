<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'phone', 'role_id', 'password'];

    public function role() { return $this->belongsTo(TypeRole::class, 'role_id'); }
    public function enrollments() { return $this->hasMany(Enrollment::class); }
}