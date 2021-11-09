<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['name' => 'Apartamento']);
        Type::create(['name' => 'Casa']);
        Type::create(['name' => 'Flat']);
        Type::create(['name' => 'Kitnet']);
        Type::create(['name' => 'Ponto Comercial']);
    }
}
