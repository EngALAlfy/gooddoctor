<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Seeder;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $types =[
            [
            'name' => 'كشف',
            'price' => 100,
        ],[
            'name' => 'اعادة',
            'price' => 70,
        ],[
            'name' => 'متابعه',
            'price' => 50,
        ],[
            'name' => 'استشارة',
            'price' => 30,
        ],
    ];

    foreach ($types as $type){
        AppointmentType::factory()->create($type);
    }
    }
}
