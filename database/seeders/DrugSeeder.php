<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Seeder;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\DB;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data file
        include_once('DrugsJsonArray.php');

        // foreach ($drugs as $value) {
        //     Drug::factory()->create($value);
        // }

        Drug::insert($drugs);

    }
}
