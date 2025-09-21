<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;            
use App\Models\Customer;              
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'invoice_number' => strtoupper(Str::random(8)),
            'customer_id' => Customer::factory(),
            'delivery_address' => $this->faker->address,
            'notes' => $this->faker->sentence,
            'status' => 'Ordered',
            'created_by' => null,
        ];
    }
}
