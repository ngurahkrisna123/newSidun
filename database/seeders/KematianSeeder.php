<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class KematianSeeder extends Seeder
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
        
        for ($i=0; $i < 150; $i++) { 
            # code...
            $gender = $faker->randomElement(['male', 'female']);
            $dateDeath = $faker->dateTimeThisDecade();

            DB::table('kematians')->insert([
                'nik' => $faker->nik(),
                'nama' => $faker->name($gender),
                'jk' => $gender,
                'tempatLahir' => $faker->city(),
                'tglLahir' => $faker->dateTimeThisCentury($dateDeath),
                'tglMeninggal' => $dateDeath,
                'tempatMeninggal' => "Denpasar",
                'sebabMeninggal' => $faker->word(),
                'kewarganegaraan' => "Indonesia"
            ]);
        }
    }
}
