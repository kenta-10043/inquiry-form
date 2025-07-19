<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'last_name' => $this->faker->lastName(255),
            'first_name' => $this->faker->firstname(255),
            'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address(255),
            'building' => $this->faker->optional()->secondaryAddress(255),
            'detail' => $this->faker->text(200),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress(255),
            'detail' => $this->faker->text(120),

        ];
    }
}
