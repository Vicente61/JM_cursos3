<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    protected $fillable = [
        'bg_image_file_id',
        'start_date',
        'end_date'
    

    ];
    public function bgImage()
    {
        return $this->belongsTo(File::class, 'bg_image_file_id');
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'template_id');
    }

}
