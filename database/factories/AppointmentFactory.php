<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => Carbon::today(),
            'user_id' => User::where('email' , 'admin')->first()->id,
            'appointment_type_id' => AppointmentType::inRandomOrder()->first()->id,
            'patient_id' => Patient::inRandomOrder()->first()->id,
        ];
    }
}
