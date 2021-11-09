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
        City::create(['name' => 'Arcoverde']);
        City::create(['name' => 'Belém do São Francisco']);
        City::create(['name' => 'Cabrobó']);
        City::create(['name' => 'Dormentes']);
        City::create(['name' => 'Floresta']);
        City::create(['name' => 'Itacuruba']);
        City::create(['name' => 'Jaboatão dos Guararapes']);
        City::create(['name' => 'Lagoa Grande']);
        City::create(['name' => 'Manari']);
        City::create(['name' => 'Nazaré da Mata']);
        City::create(['name' => 'Orocó']);
        City::create(['name' => 'Petrolândia']);
        City::create(['name' => 'Quixaba']);
        City::create(['name' => 'Recife']);
        City::create(['name' => 'Salgueiro']);
        City::create(['name' => 'Tacaratu']);
        City::create(['name' => 'Vitória de Santo Antão']);
        City::create(['name' => 'Xexéu']);
    }
}
