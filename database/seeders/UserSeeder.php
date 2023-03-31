<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => "qwerty",
            'username' => "qwerty",
            'email' => "qwerty@mail.com",
            'hakAkses' => "Admin",
            'password'=> Hash::make("1234567890")
        ]);
    }
}
