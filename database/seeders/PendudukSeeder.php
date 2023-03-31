<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use DB;

class PendudukSeeder extends Seeder
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
        // $dusun = "Tegal Kori Kaja";
        // $country = "Indonesia";

        for ($i=0; $i < 1000; $i++) { 
            # code...
            $gender = $faker->randomElement(['male', 'female']);

            DB::table('penduduks')->insert([
                'nik' => $faker->nik(),
                // 'noKK' => $faker->randomNumber(3,true),
                'noKK' => $faker->numberBetween($min = 1000, $max = 1300),
                'namaPenduduk' => $faker->name($gender),
                'jk' => $gender,
                'tempatLahir' => $faker->city(),
                'tglLahir' => $faker->dateTimeThisCentury(),
                'golDarah' => $faker->randomElement(['A','B','AB','O']),
                'alamat' => $faker->streetAddress(),
                'agama' => $faker->randomElement(['Hindu','Islam','Kristen','Katolik','Buddha','Kong Hu Cu']),
                'pendidikan' => $faker->randomElement([
                                        'Tidak/Belum Sekolah',
                                        'Belum Tamat SD/Sederajat',
                                        'Tamat SD/Sederajat',
                                        'SLTP/Sederajat',
                                        'SLTA/Sederajat',
                                        'Diploma I/II',
                                        'Akademi/Diploma III/S. Muda',
                                        'Diploma IV/Strata I',
                                        'Strata II',
                                        'Strata III']),
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
                'kewarganegaraan' => $faker->randomElement(['Indonesia','Asing']),
                'dusun' => "Tegal Kori Kaja",
                'tglBergabung' => $faker->dateTimeThisDecade()
            ]);
        }
    }
}
