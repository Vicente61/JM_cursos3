<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'enrollment_id',
        'template_id',
        'file_id',
        'issue_date'

    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }

    public function template()
    {
        return $this->belongsTo(CertificateTemplate::class, 'template_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
    