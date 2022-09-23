<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['male' , 'female'];
        $sex = $genders[$this->faker->numberBetween(0 , 1)];
        return [
            'name' => $this->faker->name($sex),
            'address' => $this->faker->address(),
            'phone' => $this->faker->numberBetween(12345678910 , 91234567890),
            'sex' => $sex,
            'age' => $this->faker->numberBetween(12 , 80),
            'user_id' => User::where('email' , 'admin')->first()->id,
        ];
    }
}
