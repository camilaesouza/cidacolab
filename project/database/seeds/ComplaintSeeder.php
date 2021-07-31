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
        DB::table('complaints')->insert([
            'name' => 'Reclamação teste',
            'address' => 'Teste cidade',
            'city' => 'Cidade teste',
            'state' => 'PR',
            'hours' => '9:00am-6:00pm',
            'latitude' => 28.452763,
            'longitude' => -81.412228,
        ]);
    }
}
