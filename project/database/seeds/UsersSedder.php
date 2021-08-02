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
            'name' => 'Camila Souza',
            'email' => 'camila@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
