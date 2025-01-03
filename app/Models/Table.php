<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    // Specify the table's fillable attributes for mass assignment
    protected $fillable = [
        'table_name', 
        'table_number', 
        'table_capacity', 
        'table_width', 
        'table_height', 
        'table_color', 
        'table_status', 
        'table_position'
    ];

    // Optionally, you can add custom methods for table-specific logic
    // For example, to change table status
    public function changeStatus($newStatus)
    {
        if (in_array($newStatus, ['Empty', 'Filled'])) {
            $this->update(['table_status' => $newStatus]);
        }
    }

    // Optionally, you can add relationships if needed (e.g., a Table could be part of a Reservation)
    // public function reservation() {
    //     return $this->hasOne(Reservation::class);
    // }
}
