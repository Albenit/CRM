<?php

namespace Database\Factories;

use App\Models\Trainings;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Trainings::class;
    public function definition()
    {
        return [
            'text' => $this->faker->name(),
            'admin_id' => random_int(1,9)
        ];
    }
}
