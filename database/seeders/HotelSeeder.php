<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::factory(15)
            ->create();
    }
}
