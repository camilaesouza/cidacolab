<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            [
                'name' => 'Admin Camila',
                'email' => 'camilaAdmin@hotmail.com',
                'password' => bcrypt('12345678'),
                'type' => \App\Enums\UserType::ADMIN,
            ],
            [
                'name' => 'Usuário Camila',
                'email' => 'camilaUsuario@hotmail.com',
                'password' => bcrypt('12345678'),
                'type' => \App\Enums\UserType::USER,
            ],
        ]);
    }
}
