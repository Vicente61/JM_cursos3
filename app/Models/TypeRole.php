<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeRole extends Model
{
    protected $fillable = [
        "name",
        "alias"
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
