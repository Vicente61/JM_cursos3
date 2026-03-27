<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'photo_file_id',
        'name',
        'title',
        'bio'
    ];


    public function photoFile(){

        return $this->belongsTo(File::class, 'photo_file_id');

    }

    
public function trainings()
{
    return $this->belongsToMany(Training::class, 'training_speaker', 'speaker_id', 'training_id');
}
   
}
