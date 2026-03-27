<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;


class Module extends Model
{
    protected $fillable = ['name', 'date_time', 'sort_order', 'topics'];
    

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'module_training')->withPivot('sort_order');
    }


  
}
