<?php

namespace Database\Factories;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function randomm():string{
        $num = random_int(1,50);
        $status = "";
        if($num > 49) $status = "Submited";
       elseif($num%2 == 0){
           $status = "Open";
       }
       else{
$status = "Done";
       }
    return $status;
    }

    public function assign(){
        $num = random_int(1,50);
        $aa = null;
        if($num > 40) $aa = null;
        elseif($num % 2 == 0) $aa = 1;
        elseif($num % 2 == 1) $aa = 0;
        return $aa;
    }
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'telephone' => $this->faker->phoneNumber(),
            'birthdate' => $this->faker->date('Y-m-d',1990),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'postal_code' => random_int(5000,10000),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'number_of_persons' => random_int(1,7),
            'nationality' => $this->faker->country(),
            'slug' => $this->faker->slug(),
            'completed' => random_int(0,1),
            'campaign_id' => random_int(1,3),
            'appointment_date' => Carbon::now()->addDay(random_int(0,14))->format('Y-m-d'),
            'assign_to_id' => null,
            'status_task' => $this->randomm(),
            'assigned' => random_int(0,1),
            'time' => $this->faker->time('H:i'),
            'wantsonline' => random_int(0,1),
            'rejected' => random_int(0,1)
        ];
    }
}
