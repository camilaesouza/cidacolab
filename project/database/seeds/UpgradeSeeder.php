<?php

use Illuminate\Database\Seeder;

class UpgradeSeeder extends Seeder
{
    /**
     * Seed invocada ao atualizar a aplicação.
     * As seeds invocadas neste arquivo deverão ser tratadas para
     * não gravarem dados duplicados.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSedder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
    }
}
