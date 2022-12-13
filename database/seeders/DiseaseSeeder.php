<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allData = [];

        for ($i=1; $i <= 36; $i++) {
            include_once("diseasesJsonArray/data ($i).php");
            $allData = array_merge($allData , $data);
        }

        // $this->command->info(count($allData));

        $allData = array_unique($allData , SORT_REGULAR);

        // $this->command->info(count($allData));

        Disease::insert($allData);
    }
}
