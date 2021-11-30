<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Belém do São Francisco']);
        City::create(['name' => 'Floresta']);
        City::create(['name' => 'Petrolândia']);
    }
}
