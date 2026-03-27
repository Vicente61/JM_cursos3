<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'path', 'mime_type', 'size'];


    

    public function certificateTemplates()
    {
        return $this->hasMany(CertificateTemplate::class, 'bg_image_file_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'file_id');
    }

    public function banners()
    {
        return $this->hasMany(Banner::class, 'image_file_id');
    }

    public function partners()
    {
        return $this->hasMany(Partner::class, 'image_file_id');
    }

    public function speakers()
    {
        return $this->hasMany(Speaker::class, 'photo_file_id');
    }
}
