<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $day = Carbon::now()->addDays(random_int(0,14));
        return [
            'employee_id' => random_int(0,7),
            'from' => $day,
            'to' => $day->addDays(random_int(0,14)),
            'type'=> $this->faker->randomDigit(),
            'description'=> $this->faker->text,
        ];
    }
}
