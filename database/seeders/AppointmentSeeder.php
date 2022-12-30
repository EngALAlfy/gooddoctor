<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // today
        for ($i=1; $i < random_int(10,100); $i++) {
            Appointment::factory()->create(['order' => $i , 'date' => Carbon::today()]);
        }

        // tomorrow
        for ($i=1; $i < random_int(10,100); $i++) {
            Appointment::factory()->create(['order' => $i , 'date' => Carbon::tomorrow()]);
        }

        // add days loop
        for ($d=2; $d < 10 ; $d++) {
            for ($i=1; $i < random_int(10,100); $i++) {
                Appointment::factory()->create(['order' => $i , 'date' => Carbon::today()->addDays($d)]);
            }
        }
    }
}
