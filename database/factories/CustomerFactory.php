<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;   

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_number' => strtoupper(Str::random(6)),
            'name' => $this->faker->company,
            'tax_data' => $this->faker->bothify('RFC####??'), // 👈 corregido
        ];
    }
}
