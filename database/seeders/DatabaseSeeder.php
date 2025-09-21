<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// 👇 importa los modelos que uses
use App\Models\Role;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\EvidencePhoto;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $roles = ['Admin', 'Sales', 'Purchasing', 'Warehouse', 'Route'];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'description' => $role . ' department'
            ]);
        }

        // Usuario admin por defecto
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@halcon.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->roles()->attach(Role::where('name', 'Admin')->first());

        // Clientes con pedidos
        Customer::factory(5)->create()->each(function ($customer) {
            Order::factory(3)->create([
                'customer_id' => $customer->id,
            ])->each(function ($order) {
                EvidencePhoto::factory(2)->create([
                    'order_id' => $order->id,
                ]);
            });
        });
    }
}
