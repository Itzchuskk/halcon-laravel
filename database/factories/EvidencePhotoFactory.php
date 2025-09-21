<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;       
use App\Models\Order;             
use App\Models\EvidencePhoto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvidencePhoto>
 */
class EvidencePhotoFactory extends Factory
{
    protected $model = EvidencePhoto::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'photo_type' => $this->faker->randomElement(['loaded', 'delivered']),
            'photo_path' => 'photos/' . Str::random(10) . '.jpg',
        ];
    }
}
