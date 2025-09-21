<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔗 Relación muchos a muchos con roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // 🔗 Relación con órdenes (según quién la creó, procesó, etc.)
    public function createdOrders()
    {
        return $this->hasMany(Order::class, 'created_by');
    }

    public function processedOrders()
    {
        return $this->hasMany(Order::class, 'processed_by');
    }

    public function routedOrders()
    {
        return $this->hasMany(Order::class, 'routed_by');
    }

    public function deliveredOrders()
    {
        return $this->hasMany(Order::class, 'delivered_by');
    }
}
