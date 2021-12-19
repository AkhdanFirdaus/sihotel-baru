<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm = new User();
        $adm->role_id = 0;
        $adm->name = 'Akhdan Musyaffa Firdaus';
        $adm->email = 'akhdan@email.com';
        $adm->password = bcrypt('password');
        $adm->phone_number = '089624289097';
        $adm->save();

        $resepsionis = new User();
        $resepsionis->role_id = 1;
        $resepsionis->name = 'Nurul Aulia Dewi';
        $resepsionis->email = 'nurul@email.com';
        $resepsionis->password = bcrypt('password');
        $resepsionis->phone_number = '08219831273';
        $resepsionis->save();

        $manager = new User();
        $manager->role_id = 2;
        $manager->name = 'Zulfa Dwi Audina';
        $manager->email = 'audi@email.com';
        $manager->password = bcrypt('password');
        $manager->phone_number = '08237192';
        $manager->save();
    }
}
