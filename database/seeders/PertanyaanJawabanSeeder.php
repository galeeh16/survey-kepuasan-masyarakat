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
            ],
            // 3
            [
                'pertanyaan_id' => 3,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 3,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 3,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 3,
                'jawaban_id' => 4
            ],
            // 4
            [
                'pertanyaan_id' => 4,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 4,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 4,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 4,
                'jawaban_id' => 4
            ],
            // 5 
            [
                'pertanyaan_id' => 5,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 5,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 5,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 5,
                'jawaban_id' => 4
            ],
            // 6 
            [
                'pertanyaan_id' => 6,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 6,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 6,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 6,
                'jawaban_id' => 4
            ],
            // 7 
            [
                'pertanyaan_id' => 7,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 7,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 7,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 7,
                'jawaban_id' => 4
            ],
            // 8 
            [
                'pertanyaan_id' => 8,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 8,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 8,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 8,
                'jawaban_id' => 4
            ],
            // 9 
            [
                'pertanyaan_id' => 9,
                'jawaban_id' => 1
            ],
            [
                'pertanyaan_id' => 9,
                'jawaban_id' => 2
            ],
            [
                'pertanyaan_id' => 9,
                'jawaban_id' => 3
            ],
            [
                'pertanyaan_id' => 9,
                'jawaban_id' => 4
            ],
        ]);
    }
}
