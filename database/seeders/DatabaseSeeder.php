<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JawabanSeeder;
use Database\Seeders\LayananSeeder;
use Database\Seeders\PertanyaanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LayananSeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(JawabanSeeder::class);
        $this->call(PertanyaanJawabanSeeder::class);
    }
}
