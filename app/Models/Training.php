<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model {
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'training_type_id', 'presentation_date_time', 'min_enrollments', 'max_enrollments'
    ];

    public function type() {
        return $this->belongsTo(TypeTraining::class, 'training_type_id');
    }

    public function speakers() {
        return $this->belongsToMany(Speaker::class, 'training_speaker');
    }

    public function modules() {
        return $this->belongsToMany(Module::class, 'module_training')->withPivot('sort_order');
    }

    public function enrollments() {
        return $this->hasMany(Enrollment::class, 'training_id');
    }
}