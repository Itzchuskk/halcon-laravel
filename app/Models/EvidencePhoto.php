<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidencePhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'photo_type',
        'photo_path',
    ];

    // 🔗 Pertenece a una orden
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
