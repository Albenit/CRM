<?php

namespace Database\Factories;

use App\Models\family;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class familyFactory extends Factory
{
    
    public function randomm():string{
        $num = random_int(1,50);
        $status = "";
        if($num > 45) $status = "Submited";
       elseif($num%2 == 0){
           $status = "Open";
       }
       else{
$status = "Done";
       }
    return $status;
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthdate' => Carbon::now()->subDays(random_int(0,12000))->format('Y-m-d'),
            'leads_id' => random_int(1,100),
            'status' => $this->randomm(),
            'status_updated_at' => Carbon::now()->subDays(random_int(1,60))->format('Y-m-d')
        ];
    }
}
