<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_name',
        'variant_status',
    ];

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'additional_variants');
    }
}
