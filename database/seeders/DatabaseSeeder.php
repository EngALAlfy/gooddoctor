<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // increase memory
        ini_set('memory_limit', '3000M');
        // disable database log to free up memory
        DB::disableQueryLog();
        // disable database events to free up memory
        DB::setEventDispatcher(new Dispatcher());

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(AppointmentTypeSeeder::class);
//        $this->call(PatientSeeder::class);
//        $this->call(AppointmentSeeder::class);
        $this->call(DrugSeeder::class);
        $this->call(DiseaseSeeder::class);
    }
}
