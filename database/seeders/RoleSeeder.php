<?php

namespace Database\Seeders;

use App\Http\Helpers\Utils;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Utils::getRoles();

        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }
    }



}
