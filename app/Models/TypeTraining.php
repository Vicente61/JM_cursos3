<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTraining extends Model
{
    protected $fillable =[
        'name',
        'alias'
    ];
    
     public function trainings()
     {
         return $this->hasMany(Training::class, 'training_type_id');
     }
}
