<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class PindahSeeder extends Seeder
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

        for ($i=0; $i < 400; $i++) { 
            # code...

            $gender = $faker->randomElement(['male', 'female']);
        
            DB::table('pindahs')->insert([
                'nik' => $faker->nik(),
                'nama' => $faker->name($gender),
                'jk' => $gender,
                'alamatAsal' => $faker->streetAddress(),
                'tglPindah' => $faker->dateTimeThisDecade(),
                'alamatPindah' => $faker->city(),
                'agama' => $faker->randomElement(['Hindu','Islam','Kristen','Katolik','Buddha','Kong Hu Cu']),
                'pekerjaan' => $faker->randomElement([
                    'Belum/Tidak Bekerja',
                    'Pelajar/Mahasiswa',
                    'Pegawai Negeri Sipil',
                    'Guru','Dosen',
                    'Karyawan Swasta',
                    'Karyawan Honorer',
                    'Mengurus Rumah Tangga',
                    'Wirausaha']),
                'status' => $faker->randomElement(['Menikah','Belum Menikah']),
                'kewarganegaraan' => "Indonesia",
                'keterangan' => $faker->word(),
            ]);
        }
    }
}
