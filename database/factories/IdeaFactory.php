<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'category_id' => $this->faker->numberBetween(1, 4),
            'status_id' => $this->faker->numberBetween(1, 5),
            'title' => ucwords($this->faker->words(4, true)),
            'description' => $this->faker->paragraphs(5, true),
            'created_at' => $this->faker->dateTimeInInterval('-3 years', '+2 years')
        ];
    }

    public function existing()
    {
        return $this->state(function(array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1, 20),
                'category_id' => $this->faker->numberBetween(1, 4),
                'status_id' => $this->faker->numberBetween(1, 5),
            ];
        });
    }
}
