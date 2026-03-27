<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use SoftDeletes;

    // Colocamos todos os campos que queres preencher, 
    // incluindo a FK (image_file_id), mas deixamos de fora o ID e os Timestamps.
    protected $fillable = [
        'image_file_id', 
        'start_date', 
        'end_date', 
        'is_active'
    ];

   

    public function image(): BelongsTo
    {
        // Aqui ligamos a FK 'image_file_id' à tabela 'files'
        return $this->belongsTo(File::class, 'image_file_id');
    }
}