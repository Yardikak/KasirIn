<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_status',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'category_menus');
    }
}
