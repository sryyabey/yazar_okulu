<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AltKursuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('alt_kursu')->insert([
           'main_kursu_id'  => random_int('1','4'),
           'baslik'         => $faker->words,
           'icerik'         => $faker->paragraph,
           'slug'           => $faker->words,
           'keywords'       => $faker->words,
           'onay'           => 0
        ]);
    }
}
