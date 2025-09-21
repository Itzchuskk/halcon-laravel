<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_number',
        'name',
        'tax_data',
    ];

    // 🔗 Relación uno a muchos con órdenes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
