<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fiillable = [ 'image_file_id', 'is_active', 'url_link'];

    public function image() {
     return $this->belongsTo(File::class, 'image_file_id');
}
}