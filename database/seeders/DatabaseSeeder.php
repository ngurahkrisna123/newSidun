<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           KelahiranSeeder::class,
           KeluargaSeeder::class,
           KematianSeeder::class,
           PendatangSeeder::class,
           PendudukSeeder::class,
           PindahSeeder::class,
           UserSeeder::class, 

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
