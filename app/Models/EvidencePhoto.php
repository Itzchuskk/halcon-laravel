<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvidencePhoto extends Model
{
    protected $fillable = ['order_id','user_id','photo_path','photo_type','notes'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
