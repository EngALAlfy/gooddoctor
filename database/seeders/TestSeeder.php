<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = [
            [
                'name' => 'cbc',
                'ar_name' => 'صورة دم',
                'info' => '',
            ],
            [
                'name' => 'uric',
                'ar_name' => 'النقرص',
                'info' => '',
            ],
            [
                'name' => 'sgot',
                'ar_name' => 'وظائف كبد',
                'info' => '',
            ],
            [
                'name' => 'fbs',
                'ar_name' => 'سكر صائم',
                'info' => '',
            ],
            [
                'name' => 'esr',
                'ar_name' => 'سرعه ترسيب',
                'info' => '',
            ],[
                'name' => 'urine',
                'ar_name' => 'بول',
                'info' => '',
            ],
        ];

        foreach ($tests as $test){
            Test::factory()->create($test);
        }
    }
}
