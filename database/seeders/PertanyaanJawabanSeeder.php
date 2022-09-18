<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pertanyaan_jawaban')->insert([
            [
                'pertanyaan_id' => 1,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 1,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 1,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 1,
                'jawaban_id' => 4
            ],
            // 2
            [
                'pertanyaan_id' => 2,
                'jawaban_id' => 5
            ],
            [
                'pertanyaan_id' => 2,
                'jawaban_id' => 6
            ],
            [
                'pertanyaan_id' => 2,
                'jawaban_id' => 7
            ],
            [
                'pertanyaan_id' => 2,
                'jawaban_id' => 8
            ]
        ]);
    }
}
