<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_fullname',
        'customer_gender',
        'customer_email',
        'customer_phone',
        'customer_birth',
        'customer_status',
    ];
}

