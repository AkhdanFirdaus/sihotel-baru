<?php

namespace Database\Seeders;

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
        $member = new Role();
        $member->role_name = 'Member';
        $member->save();

        $admin = new Role();
        $admin->role_name = 'Admin';
        $admin->save();

        $resepsionis = new Role();
        $resepsionis->role_name = 'Resepsionis';
        $resepsionis->save();

        $manajer = new Role();
        $manajer->role_name = 'Manajer';
        $manajer->save();
    }
}
