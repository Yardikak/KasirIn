<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_code',
        'order_note',
        'total_price',
        'order_status',
        'discount',
        'tax',
        'table_id',
        'customer_id',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_orders', 'order_id', 'menu_id')
                    ->withPivot('order_quantity', 'order_note', 'order_price')
                    ->withTimestamps();
    }
}
