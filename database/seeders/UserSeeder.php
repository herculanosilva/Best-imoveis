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
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'bestimoveis@bestimoveis.com.br';
        $user->password = '$2y$10$JSJKQZ702UkorUjfGCGxQ.Jd4.HbAHWyT0SOyekmlQdM2IHNd5xXW'; //1 a 8
        $user->email_verified_at = '2021-08-09 00:00:00';
        $user->save();
    }
}
