<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_cost',
        'product_price',
        'product_quantity',
        'product_image',
        'product_status',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_menus', 'menu_id', 'category_id');
    }

    public function additionals()
    {
        return $this->belongsToMany(Additional::class, 'menu_additionals', 'menu_id', 'additional_id');
    }
}
