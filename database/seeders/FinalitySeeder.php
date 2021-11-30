<?php

namespace Database\Seeders;

use App\Models\Finality;
use Illuminate\Database\Seeder;

class FinalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Finality::create(['name' => 'Aluguel']);
        Finality::create(['name' => 'Venda']);
    }
}
