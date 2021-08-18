<?php

use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complaints')->insertOrIgnore([
            'name' => 'Reclamação teste',
            'description' => "Apenas uma descrição para teste",
            'latitude' => 28.452763,
            'longitude' => -81.412228,
        ]);
    }
}
