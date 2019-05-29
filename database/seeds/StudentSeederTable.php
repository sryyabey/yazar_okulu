<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100 ; $i++){

        DB::table('students')->insert([
           'ad'      => $faker->name,
           'soyad'   => $faker->lastName,
           'email'   => $faker->email,
           'telefon' => $faker->phoneNumber,
           'meslek'  => $faker->jobTitle,
           'birthday'=> $faker->date,
           'tc'      => $faker->numberBetween(10000000,99999999999),
           'onay'    => $faker->numberBetween(1,0)
        ]);
        }
    }
}
