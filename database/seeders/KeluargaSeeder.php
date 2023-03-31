<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class KeluargaSeeder extends Seeder
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

        for ($i=0; $i < 300; $i++) { 
            # code...
            DB::table('keluargas')->insert([
                'noKK' => $faker->unique()->numberBetween($min = 1000, $max = 1300),
                'kepalaKeluarga' => $faker->name('male'),
                'jmlKeluarga' => $faker->randomDigitNotNull()
            ]);
        }

    }
}
