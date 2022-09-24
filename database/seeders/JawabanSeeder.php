<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_jawaban')->insert([
            ['jawaban' => 'Tidak Sesuai ', 'kode' => 'A', 'nilai' => 1],
            ['jawaban' => 'Kurang Sesuai', 'kode' => 'B', 'nilai' => 2],
            ['jawaban' => 'Sesuai ', 'kode' => 'C', 'nilai' => 3],
            ['jawaban' => 'Sangat Sesuai', 'kode' => 'D', 'nilai' => 4],

            // ['jawaban' => 'Tidak Mudah', 'kode' => 'A', 'nilai' => 1],
            // ['jawaban' => 'Kurang Mudah', 'kode' => 'B', 'nilai' => 2],
            // ['jawaban' => 'Mudah', 'kode' => 'C', 'nilai' => 3],
            // ['jawaban' => 'Sangat Mudah', 'kode' => 'D', 'nilai' => 4],

            // ['jawaban' => 'Tidak Cepat', 'kode' => 'A'],
            // ['jawaban' => 'Kurang Cepat', 'kode' => 'B'],
            // ['jawaban' => 'Cepat', 'kode' => 'C'],
            // ['jawaban' => 'Sangat Cepat', 'kode' => 'D'],

            // ['jawaban' => 'Sangat Mahal', 'kode' => 'A'],
            // ['jawaban' => 'Cukup Mahal', 'kode' => 'B'],
            // ['jawaban' => 'Murah', 'kode' => 'C'],
            // ['jawaban' => 'Gratis', 'kode' => 'D'],

            // ['jawaban' => 'Tidak Kompeten', 'kode' => 'A'],
            // ['jawaban' => 'Kurang Kompeten', 'kode' => 'B'],
            // ['jawaban' => 'Kompeten', 'kode' => 'C'],
            // ['jawaban' => 'Sangat Kompeten', 'kode' => 'D'],

            // ['jawaban' => 'Tidak sopan dan ramah', 'kode' => 'A'],
            // ['jawaban' => 'Kurang sopan dan ramah', 'kode' => 'B'],
            // ['jawaban' => 'Sopan dan ramah', 'kode' => 'C'],
            // ['jawaban' => 'Sangat sopan dan ramah', 'kode' => 'D'],

            // ['jawaban' => 'Buruk', 'kode' => 'A'],
            // ['jawaban' => 'Cukup', 'kode' => 'B'],
            // ['jawaban' => 'Baik', 'kode' => 'C'],
            // ['jawaban' => 'Sangat Baik', 'kode' => 'D'],

            // ['jawaban' => 'Tidak Ada', 'kode' => 'A'],
            // ['jawaban' => 'Ada tetapi tidak berfungsi', 'kode' => 'B'],
            // ['jawaban' => 'Berfungsi kurang maksimal', 'kode' => 'C'],
            // ['jawaban' => 'Dikelola dengan baik', 'kode' => 'D'],
        ]);
    }
}
