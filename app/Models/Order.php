<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'delivery_address',
        'notes',
        'status',
        'created_by',
        'processed_by',
        'routed_by',
        'delivered_by',
    ];

    // 🔗 Cliente al que pertenece la orden
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // 🔗 Fotos de evidencia de la orden
    public function evidence_photos()
    {
        return $this->hasMany(EvidencePhoto::class);
    }

    // 🔗 Relación con los usuarios responsables
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function router()
    {
        return $this->belongsTo(User::class, 'routed_by');
    }

    public function deliverer()
    {
        return $this->belongsTo(User::class, 'delivered_by');
    }
}
