<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'quantity',
        'items',
    ];

    protected $casts = [
        'entry_date' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(Item::class); // Assuming 'Item' is the name of your model
    }
}
