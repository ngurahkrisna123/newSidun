<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class KelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        
        for ($i=0; $i < 250; $i++) { 
            # code...
            $gender = $faker->randomElement(['male', 'female']);

            DB::table('kelahirans')->insert([
                'noAktaLahir' => $faker->randomNumber(8,true),
                'nama' => $faker->firstName($gender),
                'tempatLahir' => "Denpasar",
                'tglLahir' => $faker->dateTimeThisDecade(),
                'namaAyah' => $faker->name('male'),
                'namaIbu' => $faker->name('female'),
                'jk' => $gender,
                'kewarganegaraan' => "Indonesia"
            ]);
        }
    }
}
