<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PendencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        
        return [
            'admin_id' => random_int(1,5),
            'family_id' => random_int(1,5000),
            'description' => $this->faker->sentence(),
            'done' => random_int(0,1),
            'completed' => random_int(0,1),
            'title' => $this->faker->text(),
            'type' => ""
        ];
    }
}
